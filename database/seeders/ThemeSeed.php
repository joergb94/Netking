<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['#ff0000','#ff8000','#ffff00','#40ff00','#00bfff'];

        for ($i=0; $i < 5; $i++) { 
            DB::table('themes')->insert(['name'=>'theme'.$i]);
            DB::table('theme_details')->insert(['theme_id'=>$i+1,'color'=>$data[$i]]);
        }

     
    }
}
