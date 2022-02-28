<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'item_details';
    protected $fillable = [
        'id', 'item_name', 'item_quantity', 'item_size', 'item_unit_price', 'created_at', 'updated_at'
    ];

    public static function get_record($search){
        $query = ItemDetail::query();
        $query->when(@$search['freetext'], function($q) use($search) {
            $freetext = @$search['freetext'];
            $q->where(function ($q2) use ($freetext){
                $q2->orWhere('item_name', 'like' , '%' . $freetext . '%');
            });
        });

        $query->when(@$search['product_order_by'], function($q) use($search) {
            switch($search['product_order_by']){
                case 1:
                    $q->orderBy('item_unit_price', 'ASC');
                break;
                case 2:
                    $q->orderBy('item_unit_price', 'DESC');
                break;
            }
        });

        $query->when(@$search['size'], function($q) use($search) {
            $q->where('item_size', $search['size']);
        });
        return $query->get();
    }
}
