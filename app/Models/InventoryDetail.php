<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetail extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $fillable = [
        'id', 'name', 'size_S', 'size_M', 'size_L', 'unit_price', 'category', 'status', 'description', 'created_at', 'updated_at'
    ];

    public static function get_record($search){
        $query = InventoryDetail::query();

        $query->when(@$search['product_order_by'], function($q) use($search) {
            switch($search['product_order_by']){
                case 1:
                    $q->orderBy('unit_price', 'ASC');
                break;
                case 2:
                    $q->orderBy('unit_price', 'DESC');
                break;
            }
        });

        $query->when(@$search['category'], function($q) use($search) {
            $q->where('category', $search['category']);
        });
        return $query->get();
    }
}
