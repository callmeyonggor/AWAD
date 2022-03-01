<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'employee';
    protected $fillable = [
        'user_id',
        'department',
        'permission',
    ];

    public function user(){
        return $this->belongsTo(User::class)
        -> as('department');
    }
}
