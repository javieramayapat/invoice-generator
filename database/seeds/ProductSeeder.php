<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Cereal Zucaritas',
            'value' => 50.80
        ]);

        Product::create([
            'name' => 'Cepillo de dientes',
            'value' => 25.00
        ]);
        Product::create([
            'name' => 'Pasta colgate',
            'value' => 40.00
        ]);

        Product::create([
            'name' => 'Hilo dental',
            'value' => 100
        ]);

        Product::create([
            'name' => 'Libreta de ralla',
            'value' => 24.00
        ]);

        Product::create([
            'name' => 'Pinol',
            'value' => 35.00
        ]);

        Product::create([
            'name' => 'Jabón Zote',
            'value' => 12.50
        ]);

        Product::create([
            'name' => 'Nescafe 500g',
            'value' => 100.00
        ]);

        Product::create([
            'name' => 'Jabon Foca 250g',
            'value' => 15.00
        ]);

        Product::create([
            'name' => 'Bicarbonato CHURCH & DWIGHTS 227 GRS',
            'value' => 18.80
        ]);

        Product::create([
            'name' => 'Solución Antibacterial KLIN 480 ML ZUUM 1 PZA',
            'value' => 79.80
        ]);

        Product::create([
            'name' => 'Cubreboca Labable 3pz',
            'value' => 76.00
        ]);

        Product::create([
            'name' => 'Galletas Marias',
            'value' => 12.00
        ]);


    }
}
