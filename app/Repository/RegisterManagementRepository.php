<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use App\Mail\SendQRcodeMail;
use App\Models\ReserveManagement;
use App\Models\ReserveDayList;
use App\Models\Room;
use App\User;
use Mail;
use QrCode;

class RegisterManagementRepository
{
    private $paramNames = ['num', 'days', 'start_day', 'lodging', 'checkout'];

    public function __construct()
    {

    }

    /**
     * 予約一覧を取得する
     * 
     * @return ReserveManagement[]
     */
    public function getList()
    {
        $select = ['reserve_managements.id as id', 'num', 'rooms.id as roomid', 'rooms.name as room', 'days', 'checkout', 'start_day'];
        return ReserveManagement::select($select)
                                    ->where('lodging', false)
                                    ->orderBy('start_day')
                                    ->leftJoin('reserve_management_room', 'reserve_managements.id', '=', 'reserve_management_room.reserve_management_id')
                                    ->leftJoin('rooms', 'reserve_management_room.room_id', '=', 'rooms.id')
                                    ->get();
    }

    /**
     * 月別予約一覧を取得する
     * 
     * @return ReserveManagement[]
     */
    public function getListByMonth($year, $month, $room, $userId)
    {
        $select = ['reserve_managements.id as id', 'users.name as name', 'users.address as address', 'users.phone as phone', 'num', 'rooms.id as roomid', 'rooms.name as room', 'days', 'checkout', 'start_day'];
        $query = ReserveManagement::select($select)
                                ->leftJoin('reserve_management_room', 'reserve_managements.id', '=', 'reserve_management_room.reserve_management_id')
                                ->leftJoin('rooms', 'reserve_management_room.room_id', '=', 'rooms.id')
                                ->leftJoin('reserve_management_user', 'reserve_managements.id', '=', 'reserve_management_user.reserve_management_id')
                                ->leftJoin('users', 'reserve_management_user.user_id', '=', 'users.id')
                                ->where('start_day', '>=', date('Y-m-d', strtotime('first day of '.$year.'-'.$month)))
                                ->where('start_day', '<=', date('Y-m-d', strtotime('last day of '.$year.'-'.$month)))
                                ->where('reserve_management_room.room_id', $room)
                                ->where('lodging', false);
        if(Gate::denies('manager')){
            $query = $query->where('users.id', $userId);
        }
        $query = $query->orderBy('start_day');
        return $query->get();
    }

    /**
     * 予約を一件取得する
     */
    public function getReserveById($id)
    {
        $model = $this->getItemById($id);
        if(is_null($model->rooms()->first()) == false)
        {
            $model->checkout = strtotime($model->checkout) - strtotime($model->checkout.' midnight');
            $model->room_num = $model->rooms()->first()->id;
            $model->room_name = $model->rooms()->first()->name;
        }
        return $model;
    }

    /**
     * 予約を登録する
     * 
     * @return void
     */
    public function add($param, $room, $user)
    {
        Log::debug(print_r($param ,true));
        $model = new ReserveManagement;
        foreach($this->paramNames as $name)
        {
            $model->$name = $param[$name];
        }
       // $model->lock_number = $this->generateLockNumber();
        //QrCode::format('png')->size(100)->generate($model->lock_number, public_path('/img/qr.png'));
        //$model->save();
        //$this->attachToRoom($model, $room);
        //$this->attachToSchedule($model);
        //$this->attachToUser($model, $user);

        $to = [
            [
                'email' => $user->email, 
                'name' => $user->fullname,
            ]
        ];
       // Mail::to($to)->send(new SendQRcodeMail('/var/www/html/hotel-mng/public/img/qr.png'));

    }

    /**
     * 予約を更新する
     * 
     * @return void
     */
    public function updateById($id, $param, $room)
    {
        $model = $this->getItemById($id);
        foreach($this->paramNames as $name)
        {
            $model->$name = $param[$name];
        }
        $model->save();
        $this->detachToRoom($model, $model->rooms()->first()->id);
        $this->detachToSchedule($model);
        $this->attachToRoom($model, $room);
        $this->attachToSchedule($model);
    }

    /**
     * 予約を削除する
     * 
     * @return void
     */
    public function deleteById($id, $user)
    {
        $model = $this->getItemById($id);
        $this->detachToUser($model, $user);
        $this->detachToRoom($model, $model->rooms()->first()->id);
        $this->detachToSchedule($model);
        $model->delete();
    }

    /**
     * 宿泊処理を行う
     */
    public function lodging($id)
    {
        $model = $this->getItemById($id);
        $model->lodging = true;
        $model->save();
    }

    /**
     * スケジュール一覧を取得する
     */
    public function getSchedule()
    {
        $lists = array();
        $index = 0;
        return ReserveDayList::select('day', 'users.name as name', 'rooms.name as room', 'lodging')
                                ->leftJoin('reserve_day_list_reserve_management', 'reserve_day_lists.id', '=', 'reserve_day_list_reserve_management.reserve_day_list_id')
                                ->leftJoin('reserve_managements', 'reserve_day_list_reserve_management.reserve_management_id', '=', 'reserve_managements.id')
                                ->leftJoin('reserve_management_room', 'reserve_managements.id', '=', 'reserve_management_room.reserve_management_id')
                                ->leftJoin('rooms', 'reserve_management_room.room_id', '=', 'rooms.id')
                                ->leftJoin('reserve_management_user', 'reserve_management_user.reserve_management_id', '=', 'reserve_managements.id')
                                ->leftJoin('users', 'reserve_management_user.user_id', '=', 'users.id')
                                ->orderBy('day')
                                ->get();
    }

    /**
     * 月別スケジュール一覧を取得する
     */
    public function getScheduleByMonth($year, $month, $room)
    {
        return ReserveDayList::select('day', 'users.name as name', 'rooms.name as room', 'lodging')
                                ->leftJoin('reserve_day_list_reserve_management', 'reserve_day_lists.id', '=', 'reserve_day_list_reserve_management.reserve_day_list_id')
                                ->leftJoin('reserve_managements', 'reserve_day_list_reserve_management.reserve_management_id', '=', 'reserve_managements.id')
                                ->leftJoin('reserve_management_room', 'reserve_managements.id', '=', 'reserve_management_room.reserve_management_id')
                                ->leftJoin('rooms', 'reserve_management_room.room_id', '=', 'rooms.id')
                                ->leftJoin('reserve_management_user', 'reserve_management_user.reserve_management_id', '=', 'reserve_managements.id')
                                ->leftJoin('users', 'reserve_management_user.user_id', '=', 'users.id')
                                ->where('day', '>=', date('Y-m-d', strtotime('first day of '.$year.'-'.$month)))
                                ->where('day', '<=', date('Y-m-d', strtotime('last day of '.$year.'-'.$month)))
                                ->where('rooms.id', $room)
                                ->orderBy('day')
                                ->get();
    }

    /**
     * IDから予約を１件取得する
     * 
     * @return ReserveManagement
     */
    public function getItemById($id)
    {
        return ReserveManagement::where(['id' => $id])->first();
    }

    /**
     * 日付から予約を１件取得する
     * 
     * @return ReserveManagement
     */
    public function getItemsByDate($date)
    {
        return ReserveManagement::where(['start_day' => $date])->get();
    }

    /**
     * スケジュールの重複を確認する
     * 
     * @return boolean
     */
    public function checkSchedule($date, $num, $room)
    {
        for($i = 0; $i < $num; $i++)
        {
            $records = ReserveDayList::where(['day' => date('Y-m-d', strtotime($date.'+'.$i.' day'))])->get();
            if(is_null($records) == false)
            {
                foreach ($records as $record) {
                    if(is_null($record->reserveManagements()->first()) == false)
                    {
                        if(is_null($record->reserveManagements()->first()->rooms()->first()) == false)
                        {
                            if($record->reserveManagements()->first()->rooms()->first()->id == $room)
                            {
                                return false;
                            }
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * 更新時のスケジュールの重複を確認する
     * 
     * @return boolean
     */
    public function checkScheduleForUpdate($date, $num, $userId, $room)
    {
        for($i = 0; $i < $num; $i++)
        {
            $model2s = ReserveDayList::where(['day' => date('Y-m-d', strtotime($date.'+'.$i.' day'))])->get();
            if(is_null($model2s) == false)
            {
                foreach ($model2s as $model2) {
                    if(is_null($model2->reserveManagements()->first()->rooms()->first()) == false)
                    {
                        if($model2->reserveManagements()->first()->rooms()->first()->id == $room)
                        {
                            if($model2->reserveManagements()->first()->id != $userId)
                            {
                                return false;
                            }
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * 月毎に集計する
     */
    public function countByMonthly($room = 1)
    {
        $lists = ReserveDayList::select(DB::raw('DATE_FORMAT(day, "%Y-%m") as yearmonth'), DB::raw('count(*) as count'), 'rooms.name as roomname')
                                ->leftJoin('reserve_day_list_reserve_management', 'reserve_day_lists.id', '=', 'reserve_day_list_reserve_management.reserve_day_list_id')
                                ->leftJoin('reserve_managements', 'reserve_day_list_reserve_management.reserve_management_id', '=', 'reserve_managements.id')
                                ->leftJoin('reserve_management_room', 'reserve_managements.id', '=', 'reserve_management_room.reserve_management_id')
                                ->leftJoin('rooms', 'reserve_management_room.room_id', '=', 'rooms.id')
                                ->where('reserve_managements.lodging', true)
                                ->where('rooms.id', $room)
                                ->groupby('yearmonth')
                                ->groupby('roomname')
                                ->get();

        $model3 = Room::where('id', $room)->first();

        $ret = array();
        $index = 0;
        foreach($lists as $list)
        {
            $list->total = $list->count * $model3->price;
            $ret[$index] = $list;
            $index++;
        }

        return $ret;
    }

    public function getCheckoutList()
    {
        $today = date("Y-m-d 00:00:00");
        $tomorrow = date("Y-m-d 00:00:00", strtotime("tomorrow"));
        return ReserveManagement::select('rooms.name as roomname', 'checkout')
                                    ->leftJoin('reserve_management_room', 'reserve_managements.id', '=', 'reserve_management_room.reserve_management_id')
                                    ->leftJoin('rooms', 'reserve_management_room.room_id', '=', 'rooms.id')
                                    ->whereBetween('checkout', [$today, $tomorrow])
                                    ->get();
    }

    /**
     * 時間一覧を30分おきにして返す
     */
    public function getTimeList()
    {
        $time = 0;
        $ret = array();
        for($i = 0; $i < 48; $i++)
        {
            $time = strtotime('00:00 + '.($i * 30).' minute') - strtotime('00:00');
            $ret[$time] = date('H:i', $time + strtotime('00:00 + 15 hours') - strtotime('00:00'));
        }
        return $ret;
    }

    public function attachToSchedule($model)
    {
        $model2 = new ReserveDayList();
        $model2->day = $model->start_day;
        $model2->save();
        $model->reserveDayLists()->attach($model2);
        for($i = 1; $i < $model->days; $i++)
        {
            $model2 = new ReserveDayList();
            $model2->day = date('Y-m-d', strtotime($model->start_day.'+'.$i.' day'));
            $model2->save();
            $model->reserveDayLists()->attach($model2);
        }
    }

    public function detachToSchedule($model)
    {
        $model2s = $model->reserveDayLists()->get();
        $model->reserveDayLists()->detach();
        foreach($model2s as $model2)
        {
            $model2->delete();
        }
    }

    public function attachToRoom($model, $room)
    {
        $model3 = Room::where('id', $room)->first();
        $model->rooms()->attach($model3);
    }

    public function detachToRoom($model, $room)
    {
        $model3 = Room::where('id', $room)->first();
        $model->rooms()->detach($model3);
    }

    public function attachToUser($model, $user)
    {
        $model->users()->attach($user);
    }

    public function detachToUser($model, $user)
    {
        $model->users()->detach($user);
    }

    public function getParam()
    {
        return $this->paramNames;
    }

}