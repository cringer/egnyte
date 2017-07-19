<?php

namespace App\Http\Controllers\Admin;

use App\Vendor;
use App\Equipment;
use App\EquipmentType;
use App\VendorContact;
use Illuminate\Http\Request;
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
        $equipment = Equipment::all();

        return view('admin.equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::orderBy('name', 'asc')->get();
        $equipmentTypes = EquipmentType::orderBy('name', 'asc')->get();

        return view('admin.equipment.create', compact('vendors', 'equipmentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
            'equipment_type_id' => 'required|exists:equipment_types,id'
        ]);

        $equipment = Equipment::create([
            'name' => $request->name,
            'description' => $request->description,
            'vendor_id' => $request->vendor_id,
            'equipment_type_id' => $request->equipment_type_id
        ]);

        flash()->success("$equipment->name has been added!");

        return redirect()->route('admin.equipment.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        $vendors = Vendor::orderBy('name')->pluck('name', 'id');
        $equipment_types = EquipmentType::orderBy('name')->pluck('name', 'id');

        return view('admin.equipment.edit', compact('equipment', 'vendors', 'equipment_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'vendor_id' => 'required|exists:vendors,id',
            'equipment_type_id' => 'required|exists:equipment_types,id'
        ]);

        $equipment = Equipment::findOrFail($id);
        $equipment->name = $request->name;
        $equipment->description = $request->description;
        $equipment->vendor_id = $request->vendor_id;
        $equipment->equipment_type_id = $request->equipment_type_id;
        $equipment->save();

        flash()->success("$equipment->name has been added!");

        return redirect()->route('admin.equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
