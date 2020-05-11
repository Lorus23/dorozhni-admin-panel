<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guarded = ['id'];

    public static function storeBuilding($building_name)
    {
        $building = new Building();
        $building->building_name = $building_name;
        return $building ->save();
    }
}
