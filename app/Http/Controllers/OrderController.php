<?php

namespace App\Http\Controllers;
use App\Order;
use App\Person;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function index()
    {
        $orders = Order::all();
        return \View::make('admin/orders/index', compact('orders'));
    }
    public function create()
    {
        $statuses = getStatusOrdersArray();
        $persons=Person::all();
        return \View::make('admin/orders/create', compact('statuses','persons'));

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'dateOrder' => 'required|date',
            'total' => 'required|numeric',
            'observations' => 'required',
            'person_id' => 'required',
            'status' => 'required'
        ]);
        $order = new Order;
        $order->dateOrder = $request->dateOrder;
        $order->total = $request->total;
        $order->observations = $request->observations;
        $order->person_id = $request->person_id;
        $order->status = $request->status;
        $order->save();
        return redirect('admin/orders')->with('info', 'Orden Agregada Satisfatoriamente');     
    }

    public function edit($id)
    {
    	$order = Order::find($id);
        $statuses = getStatusOrdersArray(); 
        $persons = Person::all(); 	
        return \View::make('admin/orders/edit', compact('order','statuses','persons'));
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'dateOrder' => 'required|date',
            'total' => 'required|numeric',
            'observations' => 'required',
            'person_id' => 'required',
            'status' => 'required'
        ]);
    	$order = Order::find($id);
    	$order->dateOrder = $request->dateOrder;
        $order->total = $request->total;
        $order->observations = $request->observations;
        $order->person_id = $request->person_id;
    	$order->status = $request->status;
    	$order->save();
    	return redirect('admin/orders')->with('info','Orden Actualizada Satisfatoriamente');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('info','Orden Eliminada Correctamente');
    }

    
    public function show()
    {
        $orders = Order::onlyTrashed()->get();
    	return \View::make('admin/orders/paper_bin', compact('orders'));
    }
    
    public function restore($id)
    {
        Order::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info','Orden Restablecida Correctamente');
    }

    public function forcedelete($id)
    {
        Order::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info','Orden Eliminada Permanentemente');
    }
}
