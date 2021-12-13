<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BakcgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backgrounds = [
            ['name' => 'Blue', 'description' => 'https://media.istockphoto.com/photos/blue-abstract-background-or-texture-picture-id1138395421?k=20&m=1138395421&s=612x612&w=0&h=FPYxPgxJBNucc79Z3fxAehsW6gvjw5jP17CJMsBRjGM=','active' => 1 ],
            ['name' => 'Rainbow', 'description' => 'https://media.istockphoto.com/vectors/abstract-blurred-colorful-background-vector-id1248542684?k=20&m=1248542684&s=612x612&w=0&h=1yKiRrtPhiqUJXS_yJDwMGVHVkYRk2pJX4PG3TT4ZYM=','active' => 1 ],
        ];
        foreach($backgrounds as $background){
            DB::table('background_images')->insert($background);
                        }
    }
}
