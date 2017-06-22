<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Assignment;
use App\Equipment;
use App\OrderStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignments = Assignment::all();
        $statuses = OrderStatus::all();
        $equipment = Equipment::all();

        return view('admin.order.create', compact('assignments', 'statuses', 'equipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'assignment_id' => 'required|exists:assignments,id',
            'equipment_id' => 'required|exists:equipment,id',
            'order_status_id' => 'required|exists:order_statuses,id',
            'order_date' => 'required|date',
            'delivery_date' => 'nullable|date'
        ]);

        $order = Order::create([
            'assignment_id' => $request->assignment_id,
            'equipment_id' => $request->equipment_id,
            'order_status_id' => $request->order_status_id,
            'order_date' => $request->order_date,
            'deliver_date' => $request->delivery_date
        ]);

        $assignment = \App\Assignment::find($order->assignment_id);
        $assignment->order_id = $order->id;
        $assignment->save();

        flash()->success("Order has been updated!");

        return redirect()->route('admin.order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
