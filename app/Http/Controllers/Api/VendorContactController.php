<?php

namespace App\Http\Controllers\Api;

use App\VendorContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorContactController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return VendorContact::destroy($id);
    }
}