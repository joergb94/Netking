<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Group;
use App\Models\FriendsGroup;
use App\Models\Friends;
use App\Models\User;
use App\Models\Card;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class FriendsGroupRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(FriendsGroup $model)
    {
        $this->model = $model;
    }

          /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getFriendsGroup($group_id)
    {   $result = array();
        $data =  FriendsGroup::where('group_id',$group_id)
                            ->orderBy('id', 'desc')
                            ->get(); 
                foreach ($data as  $value) {
                        $user = User::find($value['friend_id']);
                       
                        array_push($result,['group_friend'=>$value,'friend'=>$user]);
                }

        return $result;
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Providers
     */
    public function createMemberGroup(array $data): FriendsGroup
    {
        return DB::transaction(function () use ($data) {

            
                $FriendsGroup = $this->model::FirstOrCreate([
                    'friend_id' => $data['friend_id'],
                    'group_id' => $data['group_id'],
                ]);

                if ($FriendsGroup) {
                    return $FriendsGroup;
                }
                throw new GeneralException(__('There was an error created the Group.'));
        });
    }

    public function deleteOrResotore($FriendsGroup_id)
    {    
        $Bval = FriendsGroup::withTrashed()->find($FriendsGroup_id)->trashed();

        return DB::transaction(function () use ($Bval,$FriendsGroup_id) {
         
          if($Bval){
            $FriendsGroup = FriendsGroup::withTrashed()->find($FriendsGroup_id)->restore();
            $b=4;
        }else{
            $FriendsGroup = FriendsGroup::find($FriendsGroup_id)->delete();
            $b=3;
        }

        if ($b) {
            return $b;
        }

        throw new GeneralException(__('Error deleteOrResotore of Group.'));

      });
  }
}