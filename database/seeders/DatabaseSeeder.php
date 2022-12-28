<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CategoriesTableSeeder::class,
        ]);

        \App\Models\User::factory(30)->create();
        //\App\Models\Banner::factory(6)->create();

        \App\Models\Banner::factory()->create(
            [
                'title' => 'Promo Carnes',
                'image' => 'banners/carnes.png',
                'category_id' => 3,
                'order' => 1,
                'timeRefresh' => 5,
                'status' => true,

            ],
        );
        \App\Models\Banner::factory()->create(
            [
                'title' => 'Promo Cachafaz',
                'image' => 'banners/cachafaz.png',
                'category_id' => 1,
                'order' => 2,
                'timeRefresh' => 5,
                'status' => true,
            ],
        );
        \App\Models\Banner::factory()->create(
            [
                'title' => 'Promo Frutas y Verduras',
                'image' => 'banners/bannerFyV.png',
                'category_id' => 2,
                'order' => 1,
                'timeRefresh' => 5,
                'status' => false,
            ],
        );
    }
}
