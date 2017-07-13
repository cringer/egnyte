<?php

namespace App\Http\Controllers;

use App\User;
use App\NewHire;
use App\Position;
use Illuminate\Http\Request;
use App\Mail\NewHireAnnounced;
use Illuminate\Support\Facades\Mail;

class NewHireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newhires = NewHire::orderBy('hire_date', 'asc')->paginate(5);

        // Collection for select fields in form
        $positions = Position::orderBy('name', 'asc')->get();

        return view('newhire.index', compact('newhires', 'positions'));
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
            'position_id' => 'required|exists:positions,id',
            'hire_date' => 'required|date'
        ]);

        $newhire = new NewHire;
        $newhire->name = $request->input('name');
        $newhire->slug = str_slug($request->input('name'));
        $newhire->position_id = $request->input('position_id');
        $newhire->hire_date = $request->input('hire_date');

        $newhire->save();

        // Send email to service desk
        Mail::to('support@aperio-it.com')->send(new NewHireAnnounced($newhire));

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
