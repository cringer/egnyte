<?php

namespace App\Http\Controllers\Admin;

use App\EquipmentType;
use Illuminate\Http\Request;
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
        $equipmentTypes = EquipmentType::all();

        return view('admin.equipmenttype.index', compact('equipmentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipmenttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $equipmenttype = EquipmentType::create([
            'name' => $request->name
        ]);

        flash()->success("$equipmenttype->name has been created!");

        return redirect()->route('admin.equipmenttype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment_type = EquipmentType::findOrFail($id);

        return view('admin.equipmenttype.edit', compact('equipment_type'));
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
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $equipment_type = EquipmentType::find($id);
        $equipment_type->name = $request->name;
        $equipment_type->save();

        flash()->success("$equipment_type->name has been created!");

        return redirect()->route('admin.equipmenttype.index');
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
