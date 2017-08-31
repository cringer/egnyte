<?php

namespace App\Http\Controllers\Api;

use App\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::orderby('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tasklist $tasklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
