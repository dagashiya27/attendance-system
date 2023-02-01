<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservation extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'r_user_id',
        'user_id',
        'start_time', 
        'finish_time',
        'remarks',
        'created_at',
        'deleted_at',
        
    ];

    const Update_at = null;


    public $timestamps = false;
}
