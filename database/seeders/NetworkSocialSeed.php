<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NetworkSocialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $menus = [
            ['name'=> 'FaceBook','icon'=> 'ti-home','link'=>'/home','prioridad'=> '3','active'=> 1,],
            ['name'=> 'FacaBook Fan Page','icon'=> 'ti-user','link'=>'/users','prioridad'=> '3','active'=> 1,],
            ['name'=> 'Twiter','icon'=> 'ti-user','link'=>'/users','prioridad'=> '3','active'=> 1,],
            ['name'=> 'Spotify','icon'=> 'ti-user','link'=>'/users','prioridad'=> '3','active'=> 1,],
        ];

        foreach($network_solcials as $ns){
            DB::table('network_socials')->insert($ns);
        }
    }
}
