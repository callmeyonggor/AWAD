<?php

namespace App\Http\Controllers;
use App\Models\Invoice;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function listing(){
        $record = Invoice::get_record();
        return view('invoice/listing', [
            'record' => $record,
        ]);
    }
}