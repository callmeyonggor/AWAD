<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'user';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'is_emply'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee(){
        return $this->hasOne('App\Models\Employee');
    }

    public function delete(){
        if ($this->employee() != null)
            $this->employee()->delete();
        return parent::delete();
    }

    // experiment @rickie
    // public function update(array $req){ 
    //     if ($this->employee() != null)
    //         $this->employee()->update([
    //             'department' => $req -> department,
    //             'permission' => $req -> permission
    //         ]);
    //     return parent::update();
    // }
}
