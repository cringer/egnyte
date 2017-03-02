<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Task;
use App\Position;
use App\TaskList;
use App\NotifyGroup;
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
        $tasklists = TaskList::orderBy('name', 'asc')->get();

        return view('admin.tasklist.index', compact('tasklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notify_groups = NotifyGroup::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();
        $positions = Position::orderBy('name', 'asc')->get();

        return view('admin.tasklist.create', compact('notify_groups', 'users', 'positions'));
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
            'icon' => 'required',
            'alert_days' => 'required',
            'position_id' => 'required|exists:positions,id',
            'user_id' => 'required|exists:users,id',
            'notify_group_id' => 'required|exists:notify_groups,id'
        ]);

        $task_list = TaskList::create($request->all());

        flash()->success("$task_list->name has been added!");

        return redirect()->route('tasklist.index');
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
        $tasklist = TaskList::findOrFail($id);
        $notify_groups = [];
        $users = User::all();
        
        foreach ($taskgroups as $taskgroup) {
            $taskgroupsArray[$taskgroup->id] = $taskgroup->name;
        }

        foreach ($users as $user) {
            $usersArray[$user->id] = $user->name;
        }

        return view('tasklist.edit', compact('tasklist', 'taskgroupsArray', 'usersArray', 'notify_groups'));
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
            'task_group_id' => 'required|exists:task_groups,id',
            'user_id' => 'required',
            'name' => 'required',
            'icon' => 'required'
        ]);

        $task_list = TaskList::find($id);
        $task_list->task_group_id = $request->input('task_group_id');
        $task_list->user_id = $request->input('user_id');
        $task_list->name = $request->input('name');
        $task_list->icon = $request->input('icon');
        $task_list->save();

        flash()->success("$task_list->name has been updated!");

        return redirect('tasklist');
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
