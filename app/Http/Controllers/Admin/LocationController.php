<?php

namespace App\Http\Controllers\Admin;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Generate slug from name
        $slug = generateSlug($request->input('name'));
        $request->merge(['slug' => $slug]);

        $this->validate($request, [
            'name' => 'required|unique:locations',
            'slug' => 'required|unique:locations'
        ]);

        $location = Location::create($request->all());

        flash()->success("$location->name has been added!");

        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'site' => 'required',
            'slug' => "required|unique:locations,null,$id"
        ]);

        $location = Location::find($id);
        $location->site = $request->input('site');
        $location->slug = $request->input('slug');
        $location->save();

        flash()->success("$location->site has been updated!");

        return redirect('location');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::destroy($id);

        flash()->success("$location->site has been deleted!");

        return redirect('location');
    }
}
