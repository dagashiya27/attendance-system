<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'affiliation',
        'name',
        'number', 
        'email',
        'address',
        'remarks',
        'password',
        
    ];


    const Update_at = null;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
       
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
       // 'email_verified_at' => 'datetime',
    ];


      /**
     * attendance関連付け
     * 1対多
     */
    public function user()
    {
        return $this->hasMany(attendance::class);
    }



public function updateUserFindById($user)
{
    return $this->where([
        'id' => $user['id']
    ])->update([
        'name' => $user['name'],
        'affiliation' => $user['affiliation'],
        'number' => $user['number'], 
        'email'=> $user['email'],
        'address'=> $user['address'],
        'remarks'=> $user['remarks'],
        'password'=> $user['pasword'],
    ]);
}

}