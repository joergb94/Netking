<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Group;
use App\Models\FriendsGroup;
use App\Repositories\FriendsGroupRepository; 
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class GroupsRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(Group $model,FriendsGroupRepository $FriendsGroupRepository)
    {
        $this->model = $model;
        $this->FriendsGroupRepository = $FriendsGroupRepository;
    }


          /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getGroups($user)
    {
                return $this->model->where('id','>',0)
                        ->where('user_id',$user->id)
                        ->orderBy('id', 'desc')
                        ->get();
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Providers
     */
    public function create(array $data)
    {
    
        return DB::transaction(function () use ($data) {
            $Group = $this->model::create([
                'user_id' => Auth::user()->id,
                'name' =>$data['name'],
            ]);
            if ($Group) {
                foreach ($data['friends'] as $friend) {
                    $this->FriendsGroupRepository->create([
                        'group_id'=>$Group->id,
                        'friend_id'=>$friend
                    ]);
                }
                return $Group;
            }

            throw new GeneralException(__('There was an error created the Group.'));
        });
    }

    /**
     * @param Providers  $Provider
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Provider
     */
    public function update($Group_id, array $data): Group
    {

        $Group = $this->model->find($Group_id);
        
        return DB::transaction(function () use ($Group, $data) {
            if ($Group->update([
                'name' => $data['name'],
            ])) {

                return $Group;
            }

            throw new GeneralException(__('There was an error updating the Group.'));
        });
    }

    public function deleteOrResotore($Group_id)
    {    
        $Bval = Group::withTrashed()->find($Group_id)->trashed();

        return DB::transaction(function () use ($Bval,$Group_id) {
         
          if($Bval){
            $Group = Group::withTrashed()->find($Group_id)->restore();
            $b=4;
        }else{
            $Group = Group::find($Group_id)->delete();
            $b=3;
        }

        if ($b) {
            return $b;
        }

        throw new GeneralException(__('Error deleteOrResotore of Group.'));

      });
  }
}