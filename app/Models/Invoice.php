<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_total', 'name','company_name','address','phone','user_id','created_at','updated_at',];
    public function orders()
    {
        return $this->hasMany(Order::class, 'InvoiceID', 'id');
    }

    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i:s';

    public static function get_record(){
        $query = Invoice::get();
        return $query;
    }
}