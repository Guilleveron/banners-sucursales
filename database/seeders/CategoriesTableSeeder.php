<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id'             => 1,
                'name'           => 'Almacen',
            ],
            [
                'id'             => 2,
                'name'           => 'Frutas',
            ],
            [
                'id'             => 3,
                'name'           => 'Carniceria',
            ],
        ];

        Category::insert($categories);
    }
}
