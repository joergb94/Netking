<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\User;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Cards_items;
use App\Models\Cards_style_detail;
use App\Models\Membership;
use App\Models\Type_membership;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
/**
 * Class ItemRepository.
 */
class ResgisterUserRepository
{
    /**
     * ItemRepository constructor.
     *
     * @param  Item  $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->type_user =3;
    }
    public function createCard($data){
        return DB::transaction(function () use ($data) {
            
            $Card =Card::create([
                'user_id'=>$data['id'],
            ]);

            if($Card){
                return $Card;
            }

            throw new GeneralException(__('There was an error created the Card.'));
        });
    }


    public function createCardDetail($data){

        $datos = Cards_items::whereIn('id',[1,2,3])->get();
        return DB::transaction(function () use ($data, $datos ) {

                    $count = 0;
                    foreach ($datos  as $detail) {
                        $Card =Card_detail::create([
                            'card_id'=>$data['id'],
                            'card_item_id' =>$detail['id'],
                            'order'=>$count++,
                        ]);
                    }
                
                    if(Card_detail::where('card_id',$data['id'])->count() > 0){
                            return true;
                    }

                    throw new GeneralException(__('There was an error created the Card.'));


        });
    }

    public function createCardStyle($card_id){

        return DB::transaction(function () use ($card_id) {
                $CardStyle =Cards_style_detail::create([
                    'card_id'=>$card_id,
                ]);
          
        
            if($CardStyle){
                    return $CardStyle;
            }
              
            throw new GeneralException(__('There was an error created the Card Style.'));

         });
    }

    public function createMembership($model)
    {
        return DB::transaction(function () use ($model){
            $membership = Membership::create([
                'user_id' => $model->id,
                'type_user_id' => $model->type_users->id,
                'quantity' => $model->type_users->max_cards,
                'type_membership_id' => 1,
            ]);
            if($membership){
                return $membership;
            }
            throw new GeneralException(__('There was an error created the Membership.'));
        });
    }

  
    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {

            $User = $this->model::create([
                'type_user_id'=>$this->type_user,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
                
            if($User){
                $Card = ResgisterUserRepository::createCard($User);
                
                if($Card){
                    
                    $CardDeatil = ResgisterUserRepository::createCardDetail($Card);
                    $CardStyle = ResgisterUserRepository::createCardStyle($Card['id']);
                    $Membership = ResgisterUserRepository::createMembership($User);
                        if($CardDeatil && $CardStyle && $Membership){
                            
                            return $User;
                        }
                        
                }
    
            }

            throw new GeneralException(__('There was an error created the User.'));
        });
    }
    

}
