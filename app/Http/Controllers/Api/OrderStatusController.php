<?php

namespace App\Http\Controllers\Api;

use App\OrderStatus;
use App\Http\Controllers\Controller;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderStatus::orderBy('name', 'asc')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OrderStatus $orderstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $orderstatus)
    {
        $orderstatus->delete($orderstatus);

        return $orderstatus->id;
    }
}
