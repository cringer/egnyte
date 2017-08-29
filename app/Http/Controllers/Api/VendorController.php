<?php

namespace App\Http\Controllers\Api;

use App\Vendor;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vendor::orderBy('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Position $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete($vendor);

        return $vendor->id;
    }
}
