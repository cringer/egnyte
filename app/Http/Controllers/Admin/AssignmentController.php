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
        $unassigned = NewHire::where('assignment_id', null)->first();

        return view('admin.assignment.index', compact('assignments', 'unassigned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newhires = NewHire::where('assignment_id', null)->orderBy('name', 'asc')->get();
        $assignmentMethods = AssignmentMethod::orderBy('name', 'asc')->get();

        return view('admin.assignments.create', compact('newhires', 'assignmentMethods'));
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
        ]);

        $assignment = Assignment::create($request->all());

        $newhire = NewHire::find($assignment->new_hire_id);
        $newhire->assignment_id = $assignment->id;
        $newhire->save();

        flash()->success("Assignment has been added!");

        return redirect()->route('admin.assignments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment_methods = AssignmentMethod::orderBy('name')->pluck('name', 'id');
        $new_hires = NewHire::orderBy('name')->pluck('name', 'id');

        return view('admin.assignments.edit', compact('assignment', 'new_hires', 'assignment_methods'));
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
            'new_hire_id' => 'required|exists:new_hires,id',
            'method_id' => 'required|exists:assignment_methods,id',
        ]);

        $assignment = Assignment::findOrFail($id);
        $assignment->new_hire_id = $request->new_hire_id;
        $assignment->method_id = $request->method_id;
        $assignment->save();

        flash()->success("$assignment->name has been updated!");

        return redirect()->route('admin.assignments.index');
    }
}
