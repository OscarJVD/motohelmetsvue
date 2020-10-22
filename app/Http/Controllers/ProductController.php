<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return \View::make('admin/products/index', compact('products'));
    }
    public function create()
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $statuses = getStatusProductsArray();
        return \View::make('admin/products/create', compact('statuses', 'subcategories', 'brands'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'      => 'required',
            'price'     => 'required|numeric',
            'barcode'   => 'required|numeric',
            'features'  => 'required|max:255',
            'image'     => 'image',
            'quantity'  => 'required|numeric'
        ]);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productos/', $name);
        }
        $product = new Product;
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->features = $request->features;
        $product->images = $name;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->brand_id = $request->brand_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->save();
        return redirect('admin/products')->with('info', 'Producto Agregada Satisfatoriamente');
    }

    public function edit($id)
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $product = Product::find($id);
        $statuses = getStatusBrandsArray();
        return \View::make('admin/products/edit', compact('product', 'statuses', 'subcategories', 'brands'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'price'     => 'required|numeric',
            'barcode'   => 'required|numeric',
            'features'  => 'required|max:255',
            'image'     => 'image',
            'quantity'  => 'required|numeric'
        ]);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productos/', $name);
        }
        $product = Product::find($id);
        $product->barcode = $request->barcode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->features = $request->features;
        if ($request->hasFile('images')) {
            $product->images = $name;
        }
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->brand_id = $request->brand_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->save();
        return redirect('admin/products')->with('info', 'Producto Actualizada Satisfatoriamente');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('info', 'Producto Eliminada Correctamente');
    }


    public function show()
    {
        $products = Product::onlyTrashed()->get();
        return \View::make('admin/products/paper_bin', compact('products'));
    }

    public function restore($id)
    {
        Product::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info', 'Producto Restablecida Correctamente');
    }

    public function forcedelete($id)
    {
        Product::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info', 'Producto Eliminada Permanentemente');
    }
}
