<?php
namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_network;
use App\Models\Cards_style_detail;
use App\Models\CardUserDetail;
use App\Models\Membership;
use App\Models\Type_membership;
use App\Models\Type_user;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeneralRepository {
   public function  __construct(Card $Card, Card_detail $Card_detail,User $User)
    {
        $this->Card = $Card;
        $this->Card_detail = $Card_detail;
        $this->User = $User;
    }

    public function card_max()
    {
        $maxCard = Membership::where('user_id',Auth::user()->id)->sum('quantity');
        $total_cards = Card::where('user_id',Auth::user()->id)->count();
        $status = ($total_cards >= $maxCard)? false : true;
        
        return $status;
    }
    public function purchase_transaction($transaction,$new_membership,$id)
    {
        $status = (isset($transaction))? $transaction : false;
        if($status)
        {
            $change = Membership::where('user_id',$id)
                ->whereNotIn('type_membership_id',[2])
                ->first();
            $num_cards = Type_membership::find($new_membership);
            if($new_membership != 1){
                $actual_date = Carbon::now();
                $date_end = Carbon::now()->addMonth(1);
                $date_renovation = $date_end;
            }else{
                $actual_date = Carbon::now();
                $date_end = NULL;
                $date_renovation = NULL;
            }
               return DB::transaction(function () use ($change, $new_membership,$num_cards,$actual_date,$date_end,$date_renovation){
                    if(
                        $change->update([
                            'quantity' => $num_cards->quantity,
                            'type_membership_id' => $new_membership,
                            'date_start' => $actual_date,
                            'date_end' => $date_end,
                            'date_renovation' => $date_renovation
                        ])
                    ){
                        GeneralRepository::update_type_user($num_cards);
                        return true;
                    }
                    throw new GeneralException(__('There was an error updating the Membership.'));
                });
        }
    }
    public function purchase_extra_transaction($transaction,$new_membership,$user)
    {
        $status = (isset($transaction))? $transaction : false;
        if($status)
        {
            $num_cards = Type_membership::find($new_membership);

               return DB::transaction(function () use ($new_membership,$num_cards,$user){
                    if(
                        Membership::create([
                            'user_id'=> $user->id,
                            'type_user_id' => $user->type_users->id,
                            'quantity' => $num_cards->quantity,
                            'type_membership_id' => $new_membership
                        ])
                    ){
                        
                        return true;
                    }
                    throw new GeneralException(__('There was an error updating the Membership.'));
                });
        }
    }
    public function cancel_membership($id_membership)
    {
        $change = Membership::where('user_id',$id_membership)
        ->whereNotIn('type_membership_id',[1])
        ->first();
        return DB::transaction(function () use ($change) {
            if($change->udpdate([
                'date_renovation' => NULL
            ])){
                return $change;
            }
            throw new GeneralException(__('There was an error canceling the Membership.'));
        });
    }

    public function renovate_membership_cron()
    {
        $memberships = Membership::whereNotIn('type_membership_id',[1])->whereNotIn('active',[0])->get();
        $today = Carbon::now();
        $data = [];
        foreach ($memberships as $membership) {
            if($today->eq($membership->date_end) == false && $membership->date_renovation != NULL){
                if($this->renovate_petition())
                {
                    $date_end = Carbon::now()->addMonth(1);
                    $date_renovation = $date_end;
                   $mbr = DB::transaction(function () use ($today,$date_end,$date_renovation,$membership){
                        if(
                            $membership->update([
                                'date_start' => $today,
                                'date_end' => $date_end,
                                'date_renovation' => $date_renovation,
                                'active' => 1,
                            ])
                        ){
                            return $membership;
                        }
                        throw new GeneralException(__('There was an error updating the Membership.'));
                    });
                }else{
                    $mbr =   DB::transaction(function () use ($membership){
                        if(
                            $membership->update([
                               'active' => 0
                            ])
                        ){
                            return $membership;
                        }
                        throw new GeneralException(__('There was an error updating the Membership.'));
                    });
                }
                array_push($data,$mbr);
            }elseif($today->eq($membership->date_end) == false && $membership->date_renovation == NULL){
                $mbr =   DB::transaction(function () use ($membership){
                    if(
                        $membership->update([
                           'active' => 0
                        ])
                    ){
                        return $membership;
                    }
                    throw new GeneralException(__('There was an error updating the Membership.'));
                });
            }
            array_push($data,$mbr);
        }
        return $data;
    }
    public function renovate($membership_id)
    {
        $membership = Membership::find($membership_id);
        if($this->renovate_petition())
        {
            $today = Carbon::now();
            $date_end = Carbon::now()->addMonth(1);
            $date_renovation = $date_end;
            return DB::transaction(function () use ($today,$date_end,$date_renovation,$membership){
                if(
                    $membership->update([
                        'date_start' => $today,
                        'date_end' => $date_end,
                        'date_renovation' => $date_renovation,
                        'active' => 1,
                    ])
                ){
                    return $membership;
                }
                throw new GeneralException(__('There was an error updating the Membership.'));
            });
        }
    }
    public function renovate_petition()
    {
        return true;
    }

    public function update_type_user($num_cards){
     
        return DB::transaction(function () use ($num_cards) {
             
                if($this->User->find(Auth::user()->id)->update([
                    'type_user_id'=>$num_cards->type_user_id,
                ])){
                    return true; 
                }
        });
       
    }

}