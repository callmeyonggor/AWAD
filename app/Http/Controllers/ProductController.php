<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listing(Request $request){
        $search = ['product_order_by' => 1];
        if ($request->isMethod('post')) { // filter function
            dd($request);
            $submit_type = $request->input('submit');

            switch ($submit_type) {
                case 'search':
                    session(['product_search' => [
                        'freetext'=> $request->input('freetext'),
                        'size'=> $request->input('size'),
                        'product_order_by'=> $request->input('product_order_by'),
                    ]]);
                break;
                case 'reset':
                    session()->forget('product_search');
                break;
            }
        }
        $search = session('product_search') ?? $search;
        return view('product/listing', [
            'product_order_by_sel' => [ '1' => 'Low to high', '2' => 'High to Low'],
            'size_sel' => [ '1' => 'S', '2' => 'M'],
        ]);
    }//
}
