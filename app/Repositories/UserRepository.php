<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserRepository 
{
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }



    
    public function getSearchPaginated($criterion,$search,$status): LengthAwarePaginator
    {         

                    $rg = (strlen($criterion) > 0 &&  strlen($search) > 0) 
                    ? $this->model->where('id','>',0)->where('id','!=',Auth::user()->id)->where($criterion, 'like', '%'. $search . '%')
                    : $this->model->where('id','>',0)->where('id','!=',Auth::user()->id);

                    switch ($status) {
                        case 1:
                            $rg;
                        break;
                        case 'D':
                            $rg->onlyTrashed();
                        break;
                } 

                    $Users = $rg->where('admin_company_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10);

            return $Users;
    }

  
    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $User = $this->model::create([
                'name' => $data['name'],
                'type_user_id'=>4,
                'occupation' => $data['occupation'],
                'phone' => $data['phone']?$data['phone']:NULL,
                'email' => $data['email'],
                'street' => $data['street']?$data['street']:NULL,
                'admin_company_id'=>Auth::user()->id,
                'password' =>Hash::make(trim($data['password'])),
            ]);

            if ($User) {
                    
                    return $User;
            }

            throw new GeneralException(__('There was an error created the User.'));
        });
    }


    public function update($User_id, array $data): User
    {

        $User = $this->model->find($User_id);
        
        return DB::transaction(function () use ($User, $data) {
            if ($User->update([
                'name' => $data['name'],
                'occupation' => $data['occupation'],
                'phone' => $data['phone']?$data['phone']:NULL,
                'email' => $data['email'],
                'street' => $data['street']?$data['street']:NULL,
            ])) {             
                   return $User;
            }

            throw new GeneralException(__('There was an error updating the User.'));
        });
    }

    
    public function updatePass($User_id, array $data): User
    {

        $User = $this->model->find($User_id);
        
        return DB::transaction(function () use ($User, $data) {
            if ($User->update([
                'password' =>Hash::make(trim($data['password'])),
            ])) {

                return $User;
            }

            throw new GeneralException(__('There was an error updating password the User.'));
        });
    }

    public function deleteOrResotore($User_id)
    {    
        $Bval = User::withTrashed()->find($User_id)->trashed();

        return DB::transaction(function () use ($Bval,$User_id) {
         
          if($Bval){
            $User = User::withTrashed()->find($User_id)->restore();
            $b=4;
        } else{
            $User = User::find($User_id)->delete();
            $b=3;
        }

          if ($b) {
          return $b;
        }

          throw new GeneralException(__('Error deleteOrResotore of User.'));
        
      });

         
    }

  

}