<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'name' => 'Jordan Essentials',
                'remaining_quantity' => '10',
                'size' => 'L',
                'unit_price' => '148.99',
                'category' => 'Graphic T-Shirts',
                'status' => true,
                'description' => 'Easy, comfortable to wear and always in style, the Jordan Essentials Boxy T-Shirt is an any time fashion favourite with classic Jordan Brand identity.'
            ], [
                'name' => 'Just Do It',
                'remaining_quantity' => '10',
                'size' => 'S',
                'unit_price' => '98.99',
                'category' => 'Graphic T-Shirts',
                'status' => true,
                'description' => 'Say the words then get to work in this "Just Do It" T-shirt from Nike Basketball. It is made from soft, comfortable cotton in an easy, relaxed fit.'
            ],[
                'name' => 'Strive For Greatness',
                'remaining_quantity' => '10',
                'size' => 'M',
                'unit_price' => '118.99',
                'category' => 'Graphic T-Shirts',
                'status' => true,
                'description' => 'LeBron lion persona comes to life in a new way with the LeBron "Strive For Greatness" T-Shirt.It features a stylised, mosaic-like lion graphic on soft, sweat-wicking fabric.'
            ],[
                'name' => 'Kyrie',
                'remaining_quantity' => '10',
                'size' => 'L',
                'unit_price' => '334.99',
                'category' => 'Long Sleeve Shirts',
                'status' => true,
                'description' => 'Kyrie signature clothing line captures the playmaker off-court style from a Nike Basketball point of view.Made from choice materials and colours, the Kyrie Pullover Hoodie uses a soft, cosy fleece with a lined hood and an adjustable hem.Printed artwork symbolises Kyrie journey.'
            ],[
                'name' => 'Nike Air',
                'remaining_quantity' => '10',
                'size' => 'S',
                'unit_price' => '278.99',
                'category' => 'Long Sleeve Shirts',
                'status' => true,
                'description' => 'Go after your hard-earned miles in soft, brushed-back comfort. The Nike Air Mid Layer delivers sweat-wicking comfort with a mesh fabric for miles of breathability. When a chill hits your route, adjustable thumbholes extend your coverage. Wear it as a layering piece or on its own with Nike Air leggings to complete the look.'
            ],[
                'name' => 'Nike ESC',
                'remaining_quantity' => '10',
                'size' => 'M',
                'unit_price' => '999.99',
                'category' => 'Long Sleeve Shirts',
                'status' => true,
                'description' => 'There is beauty in imperfections. We crafted this mid-weight jumper with nested textures and a loose-knit construction to celebrate the irregularities that yield stunning results. Relief jacquard details break up the ribbed design, adding shape and highlighting the meticulous craftsmanship.'
            ],[
                'name' => 'NOCTA Golf',
                'remaining_quantity' => '10',
                'size' => 'L',
                'unit_price' => '238.99',
                'category' => 'Polos',
                'status' => true,
                'description' => 'NOCTA offers some of the most recognisable and uniform silhouettes. With this NOCTA Golf Polo, you will have a relaxed, easy-to-wear knit design with a breathable, course-ready feel. Made to keep you looking pristine from the first tee to the final green, it is an elevated take on a functional golf essential.'
            ],[
                'name' => 'Nike Dri-FIT Victory',
                'remaining_quantity' => '10',
                'size' => 'S',
                'unit_price' => '198.99',
                'category' => 'Polos',
                'status' => true,
                'description' => 'Elevate your essentials in this lightweight, sweat-wicking polo. The colourful, repeating shield logo print is a nod to the history of Nike Golf. This product is made from 100% recycled polyester fibres.'
            ]
        ]);
    }
}
