<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\TaskList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function create()
    {
        $tasklists = TaskList::all();

        return view('admin.tasks.create')->withTasklists($tasklists);
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
            'task_list_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'order' => 'required'
        ]);

        $task = Task::create($request->all());

        flash()->success("$task->name has been added!");

        return redirect()->route('admin.tasklists.show', $request->input('task_list_id'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Task $task)
    {
        $tasklists = TaskList::orderBy('name')->pluck('name', 'id');

        return view('admin.tasks.edit', compact('task', 'tasklists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'task_list_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'order' => 'required'
        ]);

        $task->task_list_id = $request->input('task_list_id');
        $task->name = $request->input('name');
        $task->details = $request->input('details');
        $task->order = $request->input('order');
        $task->save();

        // flash()->success("Task `$task->name` has been updated!");

        return redirect()->route('admin.tasklists.show', $request->input('task_list_id'));
    }
}
