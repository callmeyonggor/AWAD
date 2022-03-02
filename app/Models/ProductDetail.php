<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'product';
    protected $fillable = [
        'id', 'name', 'remaining_quantity', 'size', 'unit_price', 'category', 'status', 'description', 'created_at', 'updated_at'
    ];

    public static function get_record($search){
        $query = ProductDetail::query();
        $query->when(@$search['freetext'], function($q) use($search) {
            $freetext = @$search['freetext'];
            $q->where(function ($q2) use ($freetext){
                $q2->orWhere('name', 'like' , '%' . $freetext . '%');
            });
        });

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

        $query->when(@$search['size'], function($q) use($search) {
            $q->where('size', $search['size']);
        });
        return $query->get();
    }
}
