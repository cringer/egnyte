<?php

namespace App\Http\Controllers\Api;

use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Position::orderBy('name', 'asc')->get();
    }

    public function show(Position $position)
    {
        return $position;
    }

    public function store(Request $request)
    {
        $position = Position::create($request->all());

        return response()->json($position, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Position $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $position->update($request->all());

        return response()->json($position, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Position $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return response()->json(null, 204);
    }
}
