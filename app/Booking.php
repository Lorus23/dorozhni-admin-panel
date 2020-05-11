<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];

    public static function storeBooking($room_number, $building_id, $category_id, $floor, $description)
    {
        $booking = new Booking();
        $booking->room_number=$room_number;
        $booking->building_id=$building_id;
        $booking->category_id=$category_id;
        $booking->floor=$floor;
        $booking->description=$description;
        return $booking->save();
    }

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

}
