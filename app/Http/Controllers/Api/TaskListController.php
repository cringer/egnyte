<?php

namespace App\Http\Controllers\Api;

use App\TaskList;
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
        return TaskList::orderby('name', 'asc')->get();
    }
}
