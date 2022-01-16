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
            ['mat'=> 'CaI','name'=> 'Header','active'=> 1,],
            ['mat'=> 'CaI','name'=> 'Links','active'=> 1,], 
            ['mat'=> 'CaI','name'=> 'Video de Youtube','active'=> 1,], 
            ['mat'=> 'CaI','name'=> 'Video de Tiktok','active'=> 1,], 
            ['mat'=> 'CaI','name'=> 'Publicacion de Facebook','active'=> 1,],     
            ['mat'=> 'CaI','name'=> 'Publicacion de Twiter','active'=> 1,],     
            ['mat'=> 'CaI','name'=> 'Archivo PDF','active'=> 1,],     
            ['mat'=> 'CaI','name'=> 'Contacto (email)','active'=> 1,],];

    
        DB::table('cards_items')->insert($card_items);

    }
}
