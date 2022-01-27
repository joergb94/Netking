<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DataMenuSeeder::class);
        $this->call(TypeUserSeeder::class);
        $this->call(CardItems::class);
        $this->call(BakcgroundSeeder::class);
        $this->call(NetworkSocialSeed::class);
        $this->call(TextStyleSeeder::class);
        $this->call(TypeMembershipSeeder::class);
        $this->call(ThemeSeed::class);
       
    }
}
