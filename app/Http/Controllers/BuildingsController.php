<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    public function index()
    {
        $building = Building::all();
        $data['buildings'] = $building;
        return view('building.index',$data);
    }

    public function create()
    {
        return view('building.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'building_name' => 'required',
        ]);
        Building::storeBuilding($request->building_name);
        return redirect()->route('buildings');
    }

    public function delete($building_id, Request $request)
    {
        Building::destroy($building_id);
        return redirect()->route('buildings');
    }

    public function edit($building_id)
    {
        $data['building'] = Building::find($building_id);
        return view('building.edit', $data);
    }

    public function update($building_id, Request $request)
    {
        $this->validate($request, [
            'building_name' => 'required',
        ]);
        Building::find($building_id)->update($request->all());
        return redirect()->route('buildings');
    }
}
