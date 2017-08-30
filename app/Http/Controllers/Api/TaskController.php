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
}
