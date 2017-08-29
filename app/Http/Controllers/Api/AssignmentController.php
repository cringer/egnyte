<?php

namespace App\Http\Controllers\Api;

use App\NewHire;
use App\Assignment;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Assignment::with(['newhire', 'method'])->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        $assignment->delete($assignment);

        $new_hire_assignment = NewHire::find($assignment->new_hire_id);
        $new_hire_assignment->assignment_id = null;
        $new_hire_assignment->save();

        return $assignment->id;
    }
}
