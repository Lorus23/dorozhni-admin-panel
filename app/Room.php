<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public static function storeRoom($room_number, $building_id, $category_id, $floor, $description)
    {
        $room = new Room();
        $room->room_number=$room_number;
        $room->building_id=$building_id;
        $room->category_id=$category_id;
        $room->floor=$floor;
        $room->description=$description;
        return $room->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class,'building_id','id');
    }


}
