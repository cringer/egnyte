<?php

namespace App\Http\Controllers\Api;

use App\VendorContact;
use App\Http\Controllers\Controller;

class VendorContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VendorContact::with('vendor')->orderBy('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  VendorContact $vendorcontact
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorContact $vendorcontact)
    {
        $vendorcontact->delete($vendorcontact);

        return $vendorcontact->id;
    }
}
