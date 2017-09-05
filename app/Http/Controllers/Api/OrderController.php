<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with(['order_status', 'assignment', 'assignment.newhire', 'equipment'])->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete($order);

        return response()->json(null, 204);
    }
}
