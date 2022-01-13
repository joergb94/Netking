<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['name'=> 'Inicio','icon'=> 'ti-home','link'=>'/home','prioridad'=> '1','active'=> 1,],
            ['name'=> 'Usuarios','icon'=> 'ti-user','link'=>'/users','prioridad'=> '2','active'=> 1,],
            ['name'=> 'My Keypls','icon'=> 'ti-user','link'=>'/myKepls','prioridad'=> '3','active'=> 1,],
            ['name'=> 'Profile','icon'=> 'ti-user','link'=>'/profile','prioridad'=> '4','active'=> 1,],
      ];
      
      foreach($menus as $menu){
            DB::table('data_menus')->insert($menu);
                        }

            DB::table('themes')->insert(['name'=>'theme1']);
            DB::table('text_styles')->insert(['name'=>'text1']);
            DB::table('background_images')->insert(['name'=>'image1']);
        
    }
}
