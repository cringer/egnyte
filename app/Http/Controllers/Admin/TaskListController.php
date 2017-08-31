<?php

namespace App\Http\Controllers\Admin;

use App\TaskList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tasklists.index');
    }

    public function create()
    {
        return view('admin.tasklists.create');
    }

    public function show()
    {
        return view('admin.tasklists.show');
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
            'name' => 'required'
        ]);

        $tasklist = TaskList::create($request->all());

        flash()->success("$tasklist->name has been added!");

        return redirect()->route('admin.tasklists.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskList $tasklist)
    {
        return view('admin.tasklists.edit')->withTasklist($tasklist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskList $tasklist)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tasklist->name = $request->input('name');
        $tasklist->save();

        flash()->success("$tasklist->name has been updated!");

        return redirect()->route('admin.tasklists.index');
    }
}
