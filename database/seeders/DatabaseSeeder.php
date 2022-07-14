<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // User::truncate();
        // Category::trucate();
        // Product::trucate();
        // Transaction::trucate();
        // DB::table('category_product')->truncate();

        // $usersQuantity = 1000;
        // $categoriesQuantity = 30;
        // $productsQuantity = 1000;
        // $transactionsQuantity = 1000;

        // factory(User::class, $usersQuantity)->create();
        // factory(User::class, $usersQuantity)->create();
        // factory(User::class, $usersQuantity)->create();
        // factory(User::class, $usersQuantity)->create();
        // Category::factory($categoriesQuantity)->create();
        // Product::factory($productsQuantity)->create()->each(
        //     function ($product) {
        //         $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');

        //         $product->categories()->attach($categories);
        //     }
        // );
        // Transaction::factory($transactionsQuantity)->create();  
    }
}
