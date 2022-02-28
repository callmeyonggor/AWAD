<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemDetail;

class ProductController extends Controller
{
    public function listing(Request $request){
        $search = ['product_order_by' => 1];
        if ($request->isMethod('post')) { // filter function
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
        $search = session('product_search') ? session('product_search') : $search;
        $record = ItemDetail::get_record($search);
        return view('product/listing', [
            'product_order_by_sel' => [ '1' => 'Low to high', '2' => 'High to Low'],
            'size_sel' => [ 
                ' ' => 'Please Select Size',
                'XXXS' => 'XXXS', 
                'XXS' => 'XXS', 
                'XS' => 'XS', 
                'S' => 'S', 
                'M' => 'M', 
                'L' => 'L', 
                'XL' => 'XL', 
                'XXL' => 'XXL', 
                'XXXL' => 'XXXL'],
            'record' => $record,
        ]);
    }//
}
