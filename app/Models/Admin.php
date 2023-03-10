<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification; 
use Laravel\Sanctum\HasApiTokens;

class Admin extends User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'number',
        'email',
        'password',
        'role',

     
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)       //追記
{                                                           //追記
    $url = url("admin/password/reset/$token");              //追記
    $this->notify(new ResetPasswordNotification($url));     //追記
}   
}