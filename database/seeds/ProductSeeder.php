<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
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
    public function run()
    {   $now = Carbon::now()->toDateTimeString();
        for ($i = 1; $i<50;$i++){
            $img_counter=$i%12;
            $type=['oranges', 'fresh-meat', 'vegetables','fastfood','fresh-fruit','drink-fruits','dried-fruit'];
            DB::table('products')->insert([
                'name' => 'Product-'.$i,
                'image' => 'img/product/product-'.$img_counter.'.jpg',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'discount'=> $i%2==0 ? 0: ($i%3==0 ? 0: ($i%3)*rand(10,20)),
                'price' => rand(149999, 249999),
                'weight' => rand(10,1000),
                'stock' => rand(50,1000),
                'type' => $type[$i%count($type)],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
        
    }
}
