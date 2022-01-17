<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryMaterial;
use App\Models\Material;
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
        // \App\Models\User::factory(10)->create();
         CategoryMaterial::factory()->count(30)->create();

        $this->call([
            // MaterialsSeeder::class
            // CategorySeeder::class
            // CategoryMaterial::class
        ]);
    }
}
