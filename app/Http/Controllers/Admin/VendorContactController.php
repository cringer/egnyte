<?php

namespace App\Http\Controllers\Admin;

use App\Vendor;
use App\VendorContact;
use Illuminate\Http\Request;
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
        $vendor_contacts = VendorContact::all();

        return view('admin.vendorcontact.index', compact('vendor_contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();

        return view('admin.vendorcontact.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric'
        ]);

        $vendorcontact = VendorContact::create([
            'vendor_id' => $request->vendor_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        flash()->success("$vendorcontact->name has been created!");

        return redirect()->route('admin.vendorcontact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VendorContact  $vendorContact
     * @return \Illuminate\Http\Response
     */
    public function show(VendorContact $vendorContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VendorContact  $vendorContact
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorContact $vendorContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VendorContact  $vendorContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VendorContact $vendorContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VendorContact  $vendorContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorContact $vendorContact)
    {
        //
    }
}
