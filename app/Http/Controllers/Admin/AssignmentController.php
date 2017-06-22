<?php

namespace App\Http\Controllers\Admin;

use App\NewHire;
use App\Assignment;
use App\AssignmentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();

        return view('admin.assignment.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newhires = NewHire::orderBy('name', 'asc')->get();
        $assignmentMethods = AssignmentMethod::orderBy('name', 'asc')->get();

        return view('admin.assignment.create', compact('newhires', 'assignmentMethods'));
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
            'new_hire_id' => 'required|exists:new_hires,id',
            'method_id' => 'required|exists:assignment_methods,id',
            'order_id' => 'nullable',
        ]);

        $assignment = Assignment::create($request->all());

        $newhire = \App\NewHire::find($assignment->new_hire_id);
        $newhire->assignment_id = $assignment->id;
        $newhire->save();

        flash()->success("Assignment has been added!");

        return redirect()->route('admin.assignment.index');
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
        //
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
        //
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
