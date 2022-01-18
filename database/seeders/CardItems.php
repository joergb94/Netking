<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $card_items = [
            ['name'=> 'Header','icon'=> 'fa fa-heading','style'=> 'bg-secondary','active'=> 1,],
            ['name'=> 'Social','icon'=> 'fa fa-icons','style'=> 'btn-blue-sky text-white','active'=> 1,], 
            ['name'=> 'Video de Youtube','icon'=> 'fa fa-youtube','style'=> 'bg-danger text-white','active'=> 1,], 
            ['name'=> 'Video de Tiktok','icon'=> 'fab fa-tiktok','style'=> 'bg-tiktok text-dark','active'=> 1,], 
            ['name'=> 'Publicacion de Facebook','icon'=> 'fa fa-facebook','style'=> 'btn-facebook','active'=> 1,],     
            ['name'=> 'Publicacion de Twiter','icon'=> 'fa fa-twitter','style'=> 'btn-twitter','active'=> 1,],     
            ['name'=> 'Play list de Spotify','icon'=> 'fa fa-spotify','style'=> 'bg-success text-dark','active'=> 1,],     
            ['name'=> 'Archivo PDF','icon'=> 'fa fa-file','style'=> 'btn-gray text-white','active'=> 1,],     
            ['name'=> 'Contacto (email)','icon'=> 'fa fa-envelope','style'=> 'bg-info text-white','active'=> 1,],
            ['name'=> 'Link','icon'=> 'fa fa-link','style'=> 'bg-dark text-white','active'=> 1,],];

           
        DB::table('cards_items')->insert($card_items);

    }
}
