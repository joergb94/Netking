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
            ['mat'=> 'CaI','name'=> 'About me','active'=> 1,], 
            ['mat'=> 'CaI','name'=> 'Videos','active'=> 1,],       ];

        foreach($card_items as $card_item){
                DB::table('cards_items')->insert($card_items);
        }
    }
}
