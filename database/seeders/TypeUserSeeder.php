<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUserSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
                      ['mat'=> 'TYU','name'=> 'Admin','max_cards'=> 10,'active'=> 1,],
                      ['mat'=> 'TYU','name'=> 'Manager','max_cards'=> 5,'active'=> 1,], 
                      ['mat'=> 'TYU','name'=> 'User','max_cards'=> 1,'active'=> 1,],       ];

        foreach($types as $type){
                DB::table('type_users')->insert($type);
            }
            $tu_prof = [
                //Admin
                  ['type_user_id'=> 1,'data_menu_id'=> 1,'active'=> 1,],
                  ['type_user_id'=> 1,'data_menu_id'=> 2,'active'=> 1,],
                  
                

                //Gestor
                  ['type_user_id'=> 2,'data_menu_id'=> 1,'active'=> 1,],

                //User 
                  ['type_user_id'=> 3,'data_menu_id'=> 1,'active'=> 1,], 
                  ['type_user_id'=> 3,'data_menu_id'=> 3,'active'=> 1,],
                  ['type_user_id'=> 3,'data_menu_id'=> 4,'active'=> 1,],  
                ];
      
            foreach($tu_prof as $tu_prof){
              DB::table('type_user_details')->insert($tu_prof);
            }
    }
}
