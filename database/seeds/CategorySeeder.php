<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
            DB::table('catrgories')->insert([
                ['name' => 'Dried Fruit','slug'=>'dried-fruit', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Vegetables','slug'=>'vegetables', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Drink Fruits', 'slug'=>'drink-fruits', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Fresh Fruit', 'slug'=>'fresh-fruit', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Fresh Meat',  'slug'=>'fresh-meat','created_at' => $now, 'updated_at' => $now],
                ['name' => 'Fastfood',  'slug'=>'fastfood','created_at' => $now, 'updated_at' => $now],
            ]
        );
       
    }
}
