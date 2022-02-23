<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\FriendsRepository;
use App\Repositories\GeneralRepository;
use App\Repositories\ResgisterUserRepository;
use App\Http\Requests\Cards\CardsRequest;
use App\Http\Requests\Cards\CardsIdRequest;
use App\Http\Requests\Cards\CardsUpdateRequest;
use App\Http\Requests\Cards\CardsStoreRequest;
use App\Models\Themes;
use App\Models\Theme_detail;
use App\Models\Cards_items;
use App\Models\Card_detail;
use App\Models\NetworkSocial;
use App\Models\Cards_style_detail;
use App\Models\Card_detail_network;
use App\Models\User;
use App\Models\Background_image;
use App\Models\Card;
use App\Models\text_style;

class FriendsController extends Controller
{
     /**
   * UserController constructor.
   *
   * @param CategoryRepository $CategoryRepository
   */
  public function __construct(CategoryRepository $CategoryRepository)
  {
      $this->CategoryRepository = $CategoryRepository;
      $this->menu_id =2;
      $this->module_name ='Categoria';
      $this->text_module = [  
                              'Creado',
                              'Actualizado',
                              'Contraseña Actualizada',
                              'Eliminado',
                              'Recuperado',
                              'Activado',
                              'Desactivado'
                          ];
  }



   /**
   * function index.
   *
   */
  public function index(Request $request){

      
          $search = trim($request->search);
          $criterion = trim($request->criterion);
          $status = ($request->status)? $request->status : 1;
          $data = $this->CategoryRepository->getSearchPaginated($criterion, $search,$status);
          $dm = accesUrl(Auth::user(),$this->menu_id);
          $ages = categoryAge::all();
          if($dm['access']){
              if ($request->ajax()) { 
                  return view('Categories.items.table',['data'=>$data,'dm'=>$dm]);
              }
                  return view('Categories.index',['data'=>$data,'dm'=>$dm,'ages'=>$ages]);

          }
          return redirect("/");
         
  }

  /**
   *
   * Return view create
   * 
   */
  public function create(Request $request)
  {   
      if ($request->ajax()) {
          $ages = categoryAge::all();
          return view('Categories.create',['ages'=>$ages]);
      }
  }

  /**
   * function store for create item.
   *
   */
  public function store(Request $request){
      $data = $this->CategoryRepository->create($request->input());

      return response()->json(Answer( $data['id'],
                                      $this->module_name,
                                      $this->text_module[0],
                                      "success",
                                      'green',
                                      '1'));
  }

  /**
   *
   * Return view update
   * 
   */
  public function edit(Request $request,$id)
  {   
      if ($request->ajax()) {
         
          $data = Category::find($id);
          $ages = categoryAge::all();

          return view('Categories.create',['data'=>$data,'ages'=>$ages]);

      }
  }

   /**
   * function update for update item.
   *
   */
  public function update(Request $request,$id){ 

      $data = $this->CategoryRepository->update($id, $request->only(
          'name',
          'category_age_id',
      ));
      return response()->json(Answer( $data['id'],
                                      $this->module_name,
                                      $this->text_module[1],
                                      "success",
                                      'yellow',
                                      '1'));
  }

   /**
   * function update for update item.
   *
   */
  public function updatePassword(Request $request,$id){ 

      $data = $this->CategoryRepository->updatePass($id, $request->only(
                  'password',
              ));

      return response()->json(Answer( $data['id'],
                                      $this->module_name,
                                      $this->text_module[2],
                                      "success",
                                      'yellow',
                                      '1'));
  }

  public function change_status(Request $request,$id)
  {
      return response()->json($this->CategoryRepository->updateStatus($request->id));
  } 

  public function deleteOrResotore(Request $request,$id)
  {    
      $state = $this->CategoryRepository->deleteOrResotore($id);
      return response()->json(Answer( $id,
                                      $this->module_name,
                                      $this->text_module[$state],
                                      "success",
                                      $state==4?'green':'red',
                                      $state==4?'1':'D'));
  }
}
