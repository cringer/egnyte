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
        $positions = Position::orderBy('name', 'asc')->get();
        // $locations = Location::orderBy('name', 'asc')->get();
        // $statuses = Status::orderBy('name', 'asc')->get();

        // return view('newhire.index', compact('newhires', 'positions', 'locations', 'statuses'));
        return view('newhire.index', compact('newhires', 'positions'));
    }

    public function store(Request $request)
    {
        // Generate slug from name
        $name = $request->input('name');
        $slug = str_replace(' ', '-', strtolower($name));

        $request->merge(['slug' => $slug]);
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:new_hires',
            'position_id' => 'required|exists:positions,id',
            'hire_date' => 'required'
        ]);
        // $this->validate($request, [
        //     'name' => 'required',
        //     'slug' => 'required|unique:new_hires',
        //     'position_id' => 'required|exists:positions,id',
        //     'status_id' => 'required|exists:statuses,id',
        //     'location_id' => 'required|exists:locations,id',
        //     'hire_date' => 'required'
        // ]);

        $newhire = NewHire::create($request->all());

        flash()->success("$newhire->name has been announced!");

        return back();
    }
}
