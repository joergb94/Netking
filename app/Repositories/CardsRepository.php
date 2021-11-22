<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Card;
use App\Models\Card_detail;
use App\Models\Card_detail_nework;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProviderRepository.
 */
class CardsRepository 
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
    public function getSearchPaginated($criterion, $search,$status): LengthAwarePaginator
    {
      
              $rg = (strlen($criterion) > 0 &&  strlen($search) > 0) 
              ? $this->model->where($criterion, 'like', '%'. $search . '%')
              : $this->model->where('id','>',0);

              switch ($status) {
                  case 1:
                      $rg;
                  break;
                  case 'D':
                      $rg->onlyTrashed();
                  break;
          } 

              $Card = $rg->orderBy('id', 'desc')->paginate(10);
                    return $Card;
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Providers
     */
    public function create(array $data,$location): Card
    {
        return DB::transaction(function () use ($data,$location) {
            $Card = $this->model::create([
                'location_id' => $location,
                'name' => $data['name'],
            ]);

            if ($Card) {
                return $Card;
            }

            throw new GeneralException(__('There was an error created the Card.'));
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
    public function update($Card_id,$location, array $data): Card
    {

        $Card = $this->model->find($Card_id);
        
        return DB::transaction(function () use ($Card, $data) {
            if ($Card->update([
                'name' => $data['name'],
            ])) {

                return $Card;
            }

            throw new GeneralException(__('There was an error updating the Card.'));
        });
    }

    /*
     * @param Providers $Provider
     * @param      $status
     *
     * @throws GeneralException
     * @return Provider
     */
     
    public function updateStatus($Card_id): Card
    {
        $Card = $this->model->find($Card_id);

        switch ($Card->active) {
            case 0:
                $Card->active = 1;
            break;
            case 1:
                $Card->active = 0;  
            break;
        }

        if ($Card->save()) {
            return $Card;
        }

        throw new GeneralException(__('Error updateStatus of Card.'));
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