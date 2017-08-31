<?php

namespace App\Http\Controllers\Api;

use App\EquipmentType;
use App\Http\Controllers\Controller;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EquipmentType::orderBy('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EquipmentType $equipmenttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentType $equipmenttype)
    {
        $equipmenttype->delete($equipmenttype);

        return $equipmenttype->id;
    }
}
