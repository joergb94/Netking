<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NetworkSocialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $network_solcials = [
            ['name'=> 'FaceBook','icon'=> 'fa fa-facebook','link'=>'/','btn_network'=> 'btn-facebook','active'=> 1,],
            ['name'=> 'FacaBook Fan Page','icon'=> 'fa fa-facebook','link'=>'/','btn_network'=> 'btn-facebook','active'=> 1,],
            ['name'=> 'Twiter','icon'=> 'fa fa-twitter','link'=>'/','btn_network'=> 'btn-twitter','active'=> 1,],
            ['name'=> 'Spotify','icon'=> 'fa fa-spotify','link'=>'/','btn_network'=> 'bg-success text-dark','active'=> 1,],
            ['name'=> 'Youtube','icon'=> 'fa fa-youtube','link'=>'/','btn_network'=> 'bg-danger text-white','active'=> 1,],
            ['name'=> 'LinkedIn','icon'=> 'fa fa-linkedin','link'=>'/','btn_network'=> 'btn-linkedin','active'=> 1,],
            ['name'=> 'Instagram','icon'=> 'fa fa-instagram','link'=>'/','btn_network'=> 'btn-instagram','active'=> 1,],
            ['name'=> 'GitHub','icon'=> 'fa fa-github','link'=>'/','btn_network'=> 'btn-github','active'=> 1,],
            ['name'=> 'TikTok','icon'=> 'fab fa-tiktok','link'=>'/','btn_network'=> 'bg-tiktok text-dark','active'=> 1,],
        ];

        foreach($network_solcials as $ns){
            DB::table('network_socials')->insert($ns);
        }
    }
}
