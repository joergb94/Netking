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
            ['name'=> 'Comunidad','icon'=> 'ti-home','link'=>'/home','prioridad'=> '1','active'=> 1,],
            ['name'=> 'Usuarios','icon'=> 'ti-user','link'=>'/users','prioridad'=> '2','active'=> 1,],
            ['name'=> 'Tarjetas','icon'=> 'ti-user','link'=>'/myKepls','prioridad'=> '3','active'=> 1,],
            ['name'=> 'Configuracion','icon'=> 'ti-user','link'=>'/profile','prioridad'=> '4','active'=> 1,],
            ['name'=> 'QR Generator','icon'=> 'ti-user','link'=>'/GeneratQR','prioridad'=> '4','active'=> 1,],
            ['name'=> '','icon'=> 'fa fa-camera','link'=>'/scanQR','prioridad'=> '4','active'=> 1,],
            ['name'=> 'Metricas','icon'=> 'ti-user','link'=>'/metrics','prioridad'=> '4','active'=> 1,],
      ];
      
      foreach($menus as $menu){
            DB::table('data_menus')->insert($menu);
                        }
        
    }
}
