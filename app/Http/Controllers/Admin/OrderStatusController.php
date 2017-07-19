<?php

namespace App\Http\Controllers\Admin;

use App\OrderStatus;
use Illuminate\Http\Request;
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
        $orderStatuses = OrderStatus::all();

        return view('admin.orderstatus.index', compact('orderStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orderstatus.create');
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
            'name' => 'required'
        ]);

        $order_status = OrderStatus::create([
            'name' => $request->name
        ]);

        flash()->success("$order_status->name has been created!");

        return redirect()->route('admin.orderstatus.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order_status = OrderStatus::findOrFail($id);

        return view('admin.orderstatus.edit', compact('order_status'));
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
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $order = OrderStatus::findOrFail($id);
        $order->name = $request->name;
        $order->save();

        flash()->success("$order->name has been updated!");

        return redirect()->route('admin.orderstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
