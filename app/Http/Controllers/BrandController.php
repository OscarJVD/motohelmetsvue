<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
    	$brands = Brand::all();
    	return \View::make('admin/brands/index', compact('brands'));
    }
    public function create()
    {
        $statuses = getStatusBrandsArray();
     	return \View::make('admin/brands/create', compact('statuses'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:brands,name',
            'status' => 'required'
        ] ,[
            'name.unique' => 'Esta Marca ya Existe'
        ]);
    	$brand = new Brand;
    	$brand->name = $request->name;
    	$brand->status = $request->status;
    	$brand->save();
    	return redirect('admin/brands')->with('info','Marca Agregada Satisfatoriamente');
    }
    public function edit($id)
    {
    	$brand = Brand::find($id);
        $statuses = getStatusBrandsArray();  	
        return \View::make('admin/brands/edit', compact('brand','statuses'));
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => "required|unique:brands,name,$id",
            'status' => 'required'
        ],[
            'name.unique' => 'Esta Marca ya Existe'
        ]);
    	$brand = Brand::find($id);
    	$brand->name = $request->name;
    	$brand->status = $request->status;
    	$brand->save();
    	return redirect('admin/brands')->with('info','Marca Actualizada Satisfatoriamente');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('info','Marca Eliminada Correctamente');
    }

    
    public function show()
    {
        $brands = Brand::onlyTrashed()->get();
    	return \View::make('admin/brands/paper_bin', compact('brands'));
    }
    
    public function restore($id)
    {
        Brand::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info','Marca Restablecida Correctamente');
    }

    public function forcedelete($id)
    {
        Brand::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info','Marca Eliminada Permanentemente');
    }
}
