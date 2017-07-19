<?php

namespace App\Http\Controllers\Admin;

use App\AssignmentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignmentMethods = AssignmentMethod::all();

        return view('admin.assignmentmethod.index', compact('assignmentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assignmentmethod.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $assignmentmethod = AssignmentMethod::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        flash()->success("$assignmentmethod->name has been created!");

        return redirect()->route('admin.assignmentmethod.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment_method = AssignmentMethod::findOrFail($id);

        return view('admin.assignmentmethod.edit', compact('assignment_method'));
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $assignment_method = AssignmentMethod::findOrFail($id);
        $assignment_method->name = $request->name;
        $assignment_method->description = $request->description;
        $assignment_method->save();

        flash()->success("$assignment_method->name has been updated!");

        return redirect()->route('admin.assignmentmethod.index');
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
