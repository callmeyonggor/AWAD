<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function retrieveOrder($InvoiceID) {
        //$invoice = Invoice::where('id', '=', $InvoiceID) -> first();
        $invoice = Invoice::find($InvoiceID);
        $order = $invoice->orders;
        return $order;
    }

    public function retrieveSpecificInvoice($InvoiceID) {
        $invoice = Invoice::where('id', '=', $InvoiceID) -> first();
        return $invoice;
    }

    public function listInvoice() {
        return view('invoice/InvoiceList');
    }

    public function view() {
        $data = Invoice::All();
        return view('invoice/userinvoicelist', ['data' => $data]);
    }

    public function retrieveInvoice() {
        return Invoice::All();
    }

    public function listing()
    {
        $record = Invoice::get_record();
        return view('invoice/listing', [
            'record' => $record,
        ]);
    }

    public function delete($id)
    {
        $query = Invoice::find($id);
        $query->delete();
        return redirect('invoice/listing');
    }

    public function edit(Request $request, $id)
    {
        $post = $invoice =  Invoice::find($id);
        if (!$invoice) {
            Session::flash('fail_msg', 'Invalid Invoice, Please try again later.');
            return redirect('/invoice/listing');
        }
        if ($request->isMethod('post')) {
            $invoice->update([
            ]);
            Session::flash('success_msg', 'Successfully updated ');
            return redirect()->route('invoice_listing');
            $post = (object) $request->all();
        }

        return view('invoice/form', [
            'submit' => route('invoice_edit', $id),
            'title' => 'Edit',
            'post' => $post,
            'invoice' => $invoice,
        ]);
    }

    public function create(Request $request){
        $post = $request;
        if ($request->isMethod('post')) {
            $invoice = Invoice::create([
                'Invoice_total' => $request->input('invoice_total'),
            ]);
            Session::flash('success_msg', 'Successfully added ');
            return redirect()->route('invoice_listing');
            $post = (object) $request->all();
        }

        return view('invoice/form', [
            'title' => 'Add',
            'post' => $post,
        ]);
    }
}