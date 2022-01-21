<?php

use App\Models\Data_menu;
use App\Models\Type_user_detail;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

if (!function_exists('accesUrl')) {
 
   
    function accesUrl($user,$menu_id)
    {
   
        //validate access of user     
        $access=Type_user_detail::where('type_user_id',$user->type_user_id)
                                ->where('data_menu_id',$menu_id)
                                ->where('active',1)
                                ->exists();
        if($access == true){
          //get all data for user menu
          $menuU = Type_user_detail::select('bam.id as id','bam.name as name','bam.icon as icon','bam.link as link')
                                    ->join('data_menus as bam', 'type_user_details.data_menu_id', '=', 'bam.id')
                                    ->where('type_user_details.type_user_id',$user->type_user_id)
                                    ->orderBy('bam.prioridad')->get();
              
        
          $memberships = Membership::where('user_id',$user->id)
                         ->where('active',1)
                         ->exists();
          $data_member = ($memberships == true)? true : false;
          $data_menu=$menuU;
          $type_user = $user->type_user_id;
        
        }else{
           $data_member = false;
           $data_menu=[];
           $type_user =0;
        }
       

        $menu=[
          'data_menu'=>$data_menu,
          'access'=>$access,
          'type_user'=>$type_user,
          'user'=>Auth::user(),
          'data_member'=>$data_member
        ];  
   
      return $menu;
    }
}
