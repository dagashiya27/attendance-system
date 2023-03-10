<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\ReserveManagement;

class RoomRepository
{
    private $paramNames = ['name', 'price'];

    /**
     * 部屋一覧を取得する
     * 
     * @return Room[]
     */
    public function getList()
    {
        return Room::get();
    }

    /**
     * 部屋を登録する
     * 
     * @return void
     */
    public function add($param)
    {
        $model = new Room;
        foreach($this->paramNames as $name)
        {
            $model->$name = $param[$name];
        }
        $model->save();
    }

    /**
     * 予約を更新する
     * 
     * @return void
     */
    public function updateById($id, $param)
    {
        $model = $this->getItemById($id);
        foreach($this->paramNames as $name)
        {
            $model->$name = $param[$name];
        }
        $model->save();
    }

    /**
     * 予約を削除する
     * 
     * @return void
     */
    public function deleteById($id)
    {
        $model = $this->getItemById($id);
        $model->delete();
    }

    /**
     * IDから部屋情報を１件取得する
     * 
     * @return Room
     */
    public function getItemById($id)
    {
        return Room::where(['id' => $id])->first();
    }

    /**
     * IDと部屋名のリストを取得する
     */
    public function getRoomList()
    {
        $rooms = Array();
        foreach(Room::get() as $room)
        {
            $rooms[$room->id] = $room->name;
        }
        return $rooms;
    }

    public function getParam()
    {
        return $this->paramNames;
    }

}