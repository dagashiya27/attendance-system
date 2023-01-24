<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveManagement extends Model
{
    use HasFactory;
    protected $table = 'reserve_managements';

    public function reserveDayLists()
    {
        return $this->belongsToMany('App\Models\ReserveDayList');
    }

    public function rooms()
    {
        return $this->belongsToMany('App\Model\Room');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}


