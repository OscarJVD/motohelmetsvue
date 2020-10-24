<?php

namespace App\Http\Controllers;
use App\Product;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return \View::make('admin/promotions/index', compact('promotions'));
    }
    public function create()
    {
        $products = Product::all();
        $statuses = getStatusPromotionsArray();
        return \View::make('admin/promotions/create', compact('statuses', 'products'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'starDate'  => 'required|date',
            'endDate'   => 'required|date',
			'status'    => 'required',
			'porcentage'=> 'required|numeric',
            'priceBefore'=> 'required|numeric',
            'priceAfter'  => 'required|numeric',
            'product_id'     => 'required'
        ]);
        $promotion = new Promotion;
        $promotion->starDate = $request->starDate;
        $promotion->endDate = $request->endDate;
        $promotion->status = $request->status;
        $promotion->porcentage = $request->porcentage;
        $promotion->priceBefore = $request->priceBefore;
        $promotion->priceAfter = $request->priceAfter;
        $promotion->product_id = $request->product_id;
        $promotion->save();
        return redirect('admin/promotions')->with('info', 'Promoción Agregada Satisfatoriamente');
    }

    public function edit($id)
    {
        $products = Product::all();
        $promotion = Promotion::find($id);
        $statuses = getStatuspromotionsArray();
        return \View::make('admin/promotions/edit', compact('promotion', 'statuses','products'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'starDate'  => 'required|date',
            'endDate'   => 'required|date',
			'status'    => 'required',
			'porcentage'=> 'required|numeric',
            'priceBefore'=> 'required|numeric',
            'priceAfter'  => 'required|numeric',
            'product_id'     => 'required'
        ]);
        $promotion = Promotion::find($id);
        $promotion->starDate = $request->starDate;
        $promotion->endDate = $request->endDate;
        $promotion->status = $request->status;
        $promotion->porcentage = $request->porcentage;
        $promotion->priceBefore = $request->priceBefore;
        $promotion->priceAfter = $request->priceAfter;
        $promotion->product_id = $request->product_id;
        $promotion->save();
        return redirect('admin/promotions')->with('info', 'Promoción Actualizada Satisfatoriamente');
    }

    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect()->back()->with('info', 'Promoción Eliminada Correctamente');
    }


    public function show()
    {
        $promotions = Promotion::onlyTrashed()->get();
        return \View::make('admin/promotions/paper_bin', compact('promotions'));
    }

    public function restore($id)
    {
        Promotion::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info', 'Promoción Restablecida Correctamente');
    }

    public function forcedelete($id)
    {
        Promotion::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info', 'Promoción Eliminada Permanentemente');
    }
}
