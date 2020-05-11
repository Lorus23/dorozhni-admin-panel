<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Building;
use App\Customer;
use App\Room;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {
        $booking = Booking::with('room','customer')->get();
        $data['bookings'] =$booking;
        return view('bookings.index',$data);
    }

    public function create()
    {
        $customer = Customer::all();
        $data['customers'] = $customer;

        $rooms = Room::all();
        $data['rooms'] = $rooms;

        return view('bookings.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
//            'room_number' => 'required',
        ]);
        Room::storeRoom($request->room_number, $request->building_id, $request->category_id, $request->floor, $request->description);
        return redirect()->route('bookings');
    }

    public function delete($booking_id, Request $request)
    {
        Building::destroy($booking_id);
        return redirect()->route('bookings');
    }

    public function edit($booking_id)
    {
        $customer = Customer::all();
        $data['customers'] = $customer;

        $rooms = Room::all();
        $data['rooms'] = $rooms;

        $data['booking'] = Booking::find($booking_id);
        return view('buildings.edit', $data);
    }

    public function update($booking_id, Request $request)
    {
        $this->validate($request, [
//            'room_number' => 'required',
        ]);
        Room::find($booking_id)->update($request->all());
        return redirect()->route('bookings');
    }

    public function show($booking_id)
    {
        $customer = Customer::all();
        $data['customers'] = $customer;

        $rooms = Room::all();
        $data['rooms'] = $rooms;

        $data['booking'] = Booking::find($booking_id);
        return view('buildings.show', $data);
    }
}
