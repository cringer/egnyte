<?php

namespace App\Http\Controllers\Api;

use App\Position;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  Position $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete($position);

        return $position->id;
    }
}
