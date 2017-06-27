<?php

namespace App\Http\Controllers\Admin;

use App\Location;
use App\NewHire;
use App\Position;
use App\Status;
use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class NewHiresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        $newhires = NewHire::orderBy('hire_date', 'asc')->paginate(5);

        // foreach ($newhires as $newhire) {
        //     if($newhire->assignment->id) {
        //         print('Has Assignment');
        //     } else {
        //         // print($newhire->assignment->id . "<br>");
        //         print('No Assignment');
        //     }
        // }
        // die;
        // Collections for select fields in form
        $positions = Position::orderBy('name', 'asc')->get();
        // $locations = Location::orderBy('name', 'asc')->get();
        // $statuses = Status::orderBy('name', 'asc')->get();

        // return view('newhire.index', compact('newhires', 'positions', 'locations', 'statuses'));
        return view('newhire.index', compact('newhires', 'positions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position_id' => 'required|exists:positions,id',
            'hire_date' => 'required|date'
        ]);

        $newhire = new NewHire;
        $newhire->name = $request->input('name');
        $newhire->slug = str_slug($request->input('name'));
        $newhire->position_id = $request->input('position_id');
        $newhire->hire_date = $request->input('hire_date');

        $newhire->save();

        flash()->success("$newhire->name has been announced!");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  $param
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        return NewHire::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();
    }
}
