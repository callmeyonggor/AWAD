<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['InvoiceID', 'ItemID','Size','Qty','created_at','updated_at',];
    use HasFactory;
    public function Invoice()
    {
        return $this->belongsTo(Invoice::class, 'InvoiceID');
    }
}