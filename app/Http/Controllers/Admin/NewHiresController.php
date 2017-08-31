<?php

namespace App\Http\Controllers\Admin;

use App\Status;
use App\NewHire;
use App\Location;
use App\Position;
use Illuminate\Http\Request;
use App\Mail\NewHireAnnounced;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class NewHiresController extends Controller
{
    public function index()
    {
        $newhires = NewHire::orderBy('hire_date', 'asc')->paginate(5);

        // Collections for select fields in form
        $positions = Position::orderBy('name', 'asc')->get();

        return view('newhires.index', compact('newhires', 'positions'));
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
