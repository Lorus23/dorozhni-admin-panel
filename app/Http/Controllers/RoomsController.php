<?php

namespace App\Http\Controllers;

use App\Category;
use App\Building;
use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $room = Room::with('building','category')->get();
        $data['rooms'] =$room;
        return view('rooms.index',$data);
    }

    public function create()
    {
        $categories = Category::all();
        $data['categories'] = $categories;

        $buildings = Building::all();
        $data['buildings'] = $buildings;

        return view('rooms.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'room_number' => 'required',
            'building_id' => 'required',
            'category_id' => 'required',
            'floor' => 'required',
            'description' => 'required',
        ]);
        Room::storeRoom($request->room_number, $request->building_id, $request->category_id, $request->floor, $request->description);
        return redirect()->route('rooms');
    }

    public function delete($room_id, Request $request)
    {
        Room::destroy($room_id);
        return redirect()->route('rooms');
    }

    public function edit($room_id)
    {
        $categories = Category::all();
        $data['categories'] = $categories;

        $buildings = Building::all();
        $data['buildings'] = $buildings;

        $data['room'] = Room::find($room_id);
        return view('rooms.edit', $data);
    }

    public function update($room_id, Request $request)
    {
        $this->validate($request, [
            'room_number' => 'required',
            'building_id' => 'required',
            'category_id' => 'required',
            'floor' => 'required',
            'description' => 'required',
        ]);
        Room::find($room_id)->update($request->all());
        return redirect()->route('rooms');
    }
}
