<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   $now = Carbon::now()->toDateTimeString();
        for ($i = 1; $i<50;$i++){
            $img_counter=$i%12;
            $type=['oranges', 'fresh-meat', 'vegetables','fastfood','fresh-fruit','drink-fruits','dried-fruit'];
            DB::table('products')->insert([
                'name' => 'Product-'.$i,
                'image' => 'img/product/product-'.$img_counter.'.jpg',
                'description' => $faker->text(200),
                'discount'=> $i%2==0 ? 0: ($i%3==0 ? 0: ($i%3)*rand(10,20)),
                'price' => rand(149999, 249999),
                'weight' => rand(10,1000),
                'stock' => rand(50,1000),
                'type' => $type[$i%count($type)],
                'created_at' => $faker->date(),
                'updated_at' => $now,
            ]);
        }
        
    }
}
