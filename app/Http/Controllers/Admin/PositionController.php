<?php

namespace App\Http\Controllers\Admin;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();

        return view('admin.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.positions.create');
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
            'acronym' => 'required|unique:positions',
            'color' => 'required'
        ]);

        $position = Position::create($request->all());

        flash()->success("$position->name has been added!");

        return redirect()->route('admin.positions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::findOrFail($id);

        return view('admin.positions.edit', compact('position'));
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
            'acronym' => [
                'required',
                Rule::unique('positions')->ignore($id),
            ],
            'color' => 'required'
        ]);

        $position = Position::find($id);
        $position->name = $request->input('name');
        $position->acronym = $request->input('acronym');
        $position->color = $request->input('color');
        $position->save();

        flash()->success("$position->name has been updated!");

        return redirect()->route('admin.positions.index');
    }
}
