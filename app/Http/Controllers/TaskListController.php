<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\NotifyGroup;
use App\TaskGroup;
use App\TaskList;
use App\Task;

class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasklists = TaskList::all();

        return view('tasklist.index', compact('tasklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task_groups = TaskGroup::orderBy('title', 'asc')->get();
        $notify_groups = NotifyGroup::orderBy('name', 'asc')->get();

        return view('tasklist.create', compact('task_groups', 'notify_groups'));
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
            'task_group_id' => 'required|exists:task_groups,id',
            'name' => 'required',
            'icon' => 'required'
        ]);

        $task_list = TaskList::create($request->all());

        flash()->success("$task_list->name has been added!");

        return redirect('tasklist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasklist = TaskList::findOrFail($id);
        $tasks = TaskList::find($id)->tasks;

        return view('tasklist.show', compact('tasklist', 'tasks'));
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
