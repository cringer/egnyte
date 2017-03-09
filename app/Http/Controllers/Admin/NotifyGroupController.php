<?php

namespace App\Http\Controllers\Admin;

use App\TaskList;
use App\NotifyGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotifyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifygroups = NotifyGroup::all();

        return view('admin.notifygroup.index', compact('notifygroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklists = TaskList::all();

        return view('admin.notifygroup.create', compact('tasklists'));
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
            'task_list_id' => 'nullable|exists:task_lists,id'
        ]);

        $notifygroup = NotifyGroup::create($request->all());

        flash()->success("$notifygroup->name has been added!");

        return redirect()->route('notifygroup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifygroup = NotifyGroup::findOrFail($id);
        // $contacts = Contact::where('', $id)->orderBy('name', 'asc')->get();

        return view('admin.notifygroup.show', compact('notifygroup'));
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
