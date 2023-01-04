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
            ['type_user_id'=>4,'membership' => 'Free','description'=>'descripcion de la membresia','quantity'=>1],
            ['type_user_id'=>NUll,'membership' => 'extra','description'=>'descripcion de la membresia','quantity'=>1],
            ['type_user_id'=>3,'membership' => 'Premium','description'=>'descripcion de la membresia','quantity'=>10],
            ['type_user_id'=>2,'membership' => 'Company','description'=>'descripcion de la membresia','quantity'=>20],
                            
                            
                           
        ];

        foreach($memberships as $membership){
            DB::table('type_memberships')->insert($membership);
          }
    }
}
