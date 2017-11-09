<?php

namespace App\Http\Controllers\Api;

use App\TaskList;
use App\Http\Controllers\Controller;
use App\Transformers\TaskListTransformer;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tasklists = TaskList::orderby('name', 'asc')->get();

        // return fractal($tasklists, new TaskListTransformer())->respond();

        return TaskList::with('tasks')->orderBy('name', 'asc')->get();
    }

    public function show(Tasklist $tasklist)
    {
        return $tasklist->load(['tasks' => function ($query) {
            $query->orderBy('order', 'asc');
        }]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tasklist $tasklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasklist $tasklist)
    {
        $tasklist->delete();

        return response()->json(null, 204);
    }
}
