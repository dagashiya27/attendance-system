<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveDayList extends Model
{
    use HasFactory;
    protected $table = 'reserve_day_lists';

    public function reserveManagements()
    {
        return $this->belongsToMany('App\Models\ReserveManagement');
    }
}
