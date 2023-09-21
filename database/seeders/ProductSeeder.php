<?php

namespace Database\Seeders;

use App\Enums\ColorEnum;
use App\Enums\StatusEnum;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    private function str_random(array $array)
    {
        $randomIndex = array_rand($array);
        return $array[$randomIndex];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* 
            Yamaha YZF-R Series:
            YZF-R1
            YZF-R6
        
            Yamaha MT Series:
            MT-09
            MT-07
            
            Yamaha FZ Series:
            FZ-25

            Yamaha WR Series:
            WR450F

            Yamaha XT Series:
            XT250

            Yamaha XSR Series:
            XSR900
            XSR700
        */

        $products = [
            [
                'name' => 'YZF-R',
                'types' => [
                    'YZF-R1',
                    'YZF-R6'
                ],
                'price' => 12000
            ],
            [
                'name' => 'MT',
                'types' => [
                    'MT-09',
                    'MT-07'
                ],
                'price' => 20000
            ],
            [
                'name' => 'FZ',
                'types' => [
                    'FZ-25',
                ],
                'price' => 12000
            ],
            [
                'name' => 'WR',
                'types' => [
                    'WR450F'
                ],
                'price' => 12000
            ],
            [
                'name' => 'XT',
                'types' => [
                    'XT250',
                ],
                'price' => 12000
            ],
            [
                'name' => 'XSR',
                'types' => [
                    'XSR900',
                    'XSR700'
                ],
                'price' => 12000
            ],
        ];

        $color = ColorEnum::toArray();

        foreach($products as $key => $product){
            $productData = Product::create([
                'name' => $product['name'],
                'image' => $product['name'].'.jpg',
                'description' => $product['name'].' description',
                'price' => $product['price'],
                'status' => StatusEnum::READY->value,
                'qty' => 20,
            ]);

            foreach($product['types'] as $type){
                $typeData = Type::create([
                    'product_id' => $productData->id,
                    'name' => $type,
                    'color' => $this->str_random($color),
                ]);
            }
        }
    }
}
