<?php

namespace App\Http\Controllers\Api;

use App\AssignmentMethod;
use App\Http\Controllers\Controller;

class AssignmentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AssignmentMethod::orderBy('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AssignmentMethod $assignmentmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentMethod $assignmentmethod)
    {
        $assignmentmethod->delete($assignmentmethod);

        return $assignmentmethod->id;
    }
}
