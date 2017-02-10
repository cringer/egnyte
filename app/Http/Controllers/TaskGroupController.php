<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Position;
use App\TaskGroup;

class TaskGroupController extends Controller
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
        $taskgroups = TaskGroup::orderBy('title', 'asc')->get();

        return view('taskgroup.index', compact('taskgroups', 'positionArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::orderBy('title', 'asc')->get();

        return view('taskgroup.create', compact('positions'));
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
            'position_id' => 'required|exists:positions,id'
        ]);

        $task_group = TaskGroup::create($request->all());

        flash()->success("$task_group->name has been added!");

        return redirect('taskgroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taskgroup = TaskGroup::findOrFail($id);

        return view('taskgroup.show', compact('taskgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskgroup = TaskGroup::findOrFail($id);
        $positions = Position::all();
        
        foreach ($positions as $position) {
            $positionsArray[$position->id] = $position->title;
        }

        return view('taskgroup.edit', compact('taskgroup', 'positionsArray'));
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
            'position_id' => 'required|exists:positions,id'
        ]);

        $task_group = TaskGroup::find($id);
        $task_group->name = $request->input('name');
        $task_group->position_id = $request->input('position_id');
        $task_group->save();

        flash()->success("$task_group->name has been updated!");

        return redirect('taskgroup');
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
