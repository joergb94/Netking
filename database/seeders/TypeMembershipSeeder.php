<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberships = [
            ['membership' => 'free','description'=>'descripcion de la membresia','quantity'=>1],
            ['membership' => 'extra','description'=>'descripcion de la membresia','quantity'=>1],
            ['membership' => 'premium','description'=>'descripcion de la membresia','quantity'=>10],
            ['membership' => 'Empresa','description'=>'descripcion de la membresia','quantity'=>20],
        ];

        foreach($memberships as $membership){
            DB::table('type_memberships')->insert($membership);
          }
    }
}
