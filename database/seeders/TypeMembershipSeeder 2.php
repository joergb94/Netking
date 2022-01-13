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
            ['membership' => 'free'],
            ['membership' => 'extra'],
            ['membership' => 'premium'],
            ['membership' => 'Empresa'],
        ];

        foreach($memberships as $membership){
            DB::table('type_memberships')->insert($membership);
          }
    }
}
