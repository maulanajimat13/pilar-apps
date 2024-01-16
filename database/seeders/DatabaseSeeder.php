<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            ProductsSeeder::class
        ]);
        \App\Models\User::factory(40)->create()->each(function($user) {
            $user->assignRole('user');
        });
        \App\Models\UserProfile::factory(43)->create();

        Product::create([
            'product_name' => 'Clas Mild Redmax',
            'brand' => 'Clas Mild',
            'unit' => 'PCS',
            'product_slug' =>'Clas Mild RedmaxPCS',
            'price' => '25000'

        ]);

        Product::create([
            'product_name' => 'Clas Mild Redmax',
            'brand' => 'Clas Mild',
            'unit' => 'SLOP',
            'product_slug' =>'Clas Mild RedmaxSLOP',
            'price' => '250000'

        ]);

        Product::create([
            'product_name' => 'Clas Mild Silver',
            'brand' => 'Clas Mild',
            'unit' => 'PCS',
            'product_slug' =>'Clas Mild RedmaxPCSilverPCS',
            'price' => '30000'

        ]);

        Product::create([
            'product_name' => 'Clas Mild Silver',
            'brand' => 'Clas Mild',
            'unit' => 'SLOP',
            'product_slug' =>'Clas Mild SilverSLOP',
            'price' => '300000'

        ]);
    }
}
