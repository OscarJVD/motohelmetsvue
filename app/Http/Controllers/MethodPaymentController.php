<?php

namespace App\Http\Controllers;
use App\MethodPayment;
use Illuminate\Http\Request;

class MethodPaymentController extends Controller
{
	public function index()
    {
        $methodpayments = MethodPayment::all();
        return \View::make('admin/methodpayments/index', compact('methodpayments'));
    }

    public function create()
    {
        $statuses = getStatusMethodPaymentsArray();
        return \View::make('admin/methodpayments/create', compact('statuses'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name'      => 'required',
            'status'     => 'required'
            
        ]);
        $methodpayment = new MethodPayment;
        $methodpayment->name = $request->name;
        $methodpayment->status = $request->status;
        $methodpayment->save();
        return redirect('admin/methodpayments')->with('info', 'Metodo de pago Agregado Satisfatoriamente');
    }

    public function edit($id)
    {
        $methodpayment = MethodPayment::find($id);
        $statuses = getStatusMethodPaymentsArray();
        return \View::make('admin/methodpayments/edit', compact('methodpayment', 'statuses'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'status'     => 'required'
        ]);
        
        $methodpayment = MethodPayment::find($id);
        $methodpayment->name = $request->name;
        $methodpayment->status = $request->status;
        $methodpayment->save();
        return redirect('admin/methodpayments')->with('info', 'Metodo de pago Actualizado Satisfatoriamente');
    }

    public function destroy($id)
    {
        $methodpayment = MethodPayment::find($id);
        $methodpayment->delete();
        return redirect()->back()->with('info', 'Metodo de pago Eliminado Correctamente');
    }

    public function show()
    {
        $methodpayments = MethodPayment::onlyTrashed()->get();
        return \View::make('admin/methodpayments/paper_bin', compact('methodpayments'));
    }

    public function restore($id)
    {
        MethodPayment::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info', 'Metodo de pago Restablecido Correctamente');
    }

    public function forcedelete($id)
    {
        MethodPayment::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info', 'Metodo de pago Eliminado Permanentemente');
    }
    
}
