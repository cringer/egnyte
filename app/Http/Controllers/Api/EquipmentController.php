<?php

namespace App\Http\Controllers\Api;

use App\Equipment;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipment::with(['vendor', 'equipmentType'])->orderBy('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Equipment $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete($equipment);

        return response()->json(null, 204);
    }
}
