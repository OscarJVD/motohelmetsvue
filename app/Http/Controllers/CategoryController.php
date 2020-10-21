<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return \View::make('admin/categories/index', compact('categories'));
    }
    public function create()
    {
        $statuses = getStatusCategoriesArray();
     	return \View::make('admin/categories/create', compact('statuses'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
            'status' => 'required'
        ] ,[
            'name.unique' => 'Esta Categoria ya Existe'
        ]);
    	$brand = new Category;
    	$brand->name = $request->name;
    	$brand->status = $request->status;
    	$brand->save();
    	return redirect('admin/categories')->with('info','Categoria Agregada Satisfatoriamente');
    }
    public function edit($id)
    {
    	$category = Category::find($id);
        $statuses = getStatusCategoriesArray();  	
        return \View::make('admin/categories/edit', compact('category','statuses'));
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => "required|unique:categories,name,$id",
            'status' => 'required'
        ],[
            'name.unique' => 'Esta Categoria ya Existe'
        ]);
    	$brand = Category::find($id);
    	$brand->name = $request->name;
    	$brand->status = $request->status;
    	$brand->save();
    	return redirect('admin/categories')->with('info','Categoria Actualizada Satisfatoriamente');
    }

    public function destroy($id)
    {
        $brand = Category::find($id);
        $brand->delete();
        return redirect()->back()->with('info','Categoria Eliminada Correctamente');
    }

    
    public function show()
    {
        $categories = Category::onlyTrashed()->get();
    	return \View::make('admin/categories/paper_bin', compact('categories'));
    }
    
    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info','Categoria Restablecida Correctamente');
    }

    public function forcedelete($id)
    {
        Category::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info','Categoria Eliminada Permanentemente');
    }
}
