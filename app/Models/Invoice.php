<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';
    protected $primaryKey = 'invoice_id';
    protected $dateFormat = 'Y-m-d H:i:s';

    public static function get_record(){
        $query = Invoice::get();
        return $query;
    }
}
