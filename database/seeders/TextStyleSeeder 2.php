<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text_styles = [
            ['name'=> 'Bebas Neue, cursive'],
            ['name'=> 'IBM Plex Sans, sans-serif'],
            ['name'=> 'Island Moments, cursive'],
            ['name'=> 'M PLUS 1p, sans-serif'],
            ['name'=> 'Playfair Display, serif'],
            ['name'=> 'Pushster, cursive'],
            ['name'=> 'Roboto, sans-serif'],
            ['name'=> 'Roboto Mono, monospace'],
            ['name'=> 'Shizuru, cursive'],
        ];

        foreach($text_styles as $ts){
            DB::table('text_styles')->insert($ts);
        }
    }
}
