<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_items;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class HomeRepository 
{
    /**
     * ProviderRepository constructor.
     *
     * @param  Providers  $model
     */
    public function __construct(Card $model)
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
    public function getSearchPaginated($criterion, $search,$status)
    {
                    $rg = (strlen($criterion) > 0 &&  strlen($search) > 0) 
                    ? $this->model->where('user_id',Auth::user()->id)->where($criterion, 'like', '%'. $search . '%')
                    : $this->model->where('user_id',Auth::user()->id);

                    $data['cards'] = $rg->orderBy('id', 'desc')->get();

            return $data;
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Providers
     */
    public function create(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            $Category = $this->model::create([
                'user_id'=>Auth::user()->id,
                'name' => $data['name'],
            ]);

            if ($Category) {
                return $Category;
            }

            throw new GeneralException(__('There was an error created the Provider.'));
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
    public function update($Category_id, array $data): Category
    {

        $Category = $this->model->find($Category_id);
        
        return DB::transaction(function () use ($Category, $data) {
            if ($Category->update([
                'name' => $data['name'],
            ])) {

                return $Category;
            }

            throw new GeneralException(__('There was an error updating the Provider.'));
        });
    }

    /*
     * @param Providers $Provider
     * @param      $status
     *
     * @throws GeneralException
     * @return Provider
     */
     
    public function updateStatus($Category_id): Category
    {
        $Category = $this->model->find($Category_id);

        switch ($Category->active) {
            case 0:
                $Category->active = 1;
            break;
            case 1:
                $Category->active = 0;  
            break;
        }

        if ($Category->save()) {
            return $Category;
        }

        throw new GeneralException(__('Error updateStatus of Category.'));
    }

    public function deleteOrResotore($Card_id)
    {    
        $Bval = Card::withTrashed()->find($Card_id)->trashed();

        return DB::transaction(function () use ($Bval,$Card_id) {
         
            if($Bval){
                $Card = Card::withTrashed()->find($Card_id)->restore();
                $b=4;
            }else{
                $Card = Card::find($Card_id)->delete();
                $b=3;
            }

            if ($b) {
                return $b;
            }

            throw new GeneralException(__('Error deleteOrResotore of Card.'));

        });
        }

  

}
