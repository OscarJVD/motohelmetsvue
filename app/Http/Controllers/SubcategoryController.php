<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();
       	return \View::make('admin/subcategories/index', compact('subcategories'));
    }
    public function create()
    {
        $categories = Category::all();
        $statuses = getStatusSubCategoriesArray();
     	return \View::make('admin/subcategories/create', compact('statuses','categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:subcategories,name',
            'status' => 'required'
        ] ,[
            'name.unique' => 'Esta SubCategoria ya Existe'
        ]);
    	$subcategory = new Subcategory;
    	$subcategory->name = $request->name;
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;        
    	$subcategory->save();
    	return redirect('admin/subcategories')->with('info','SubCategoria Agregada Satisfatoriamente');
    }
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        $statuses = getStatusSubCategoriesArray();  	
        return \View::make('admin/subcategories/edit', compact('subcategory','statuses','categories'));
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => "required|unique:subcategories,name,$id",
            'status' => 'required'
        ],[
            'name.unique' => 'Esta SubCategoria ya Existe'
        ]);
    	$subcategory = Subcategory::find($id);
    	$subcategory->name = $request->name;
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;   
    	$subcategory->save();
    	return redirect('admin/subcategories')->with('info','SubCategoria Actualizada Satisfatoriamente');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with('info','SubCategoria Eliminada Correctamente');
    }

    
    public function show()
    {
        $subcategories = Subcategory::onlyTrashed()->get();
    	return \View::make('admin/subcategories/paper_bin', compact('subcategories'));  
    }
    
    public function restore($id)
    {
        Subcategory::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('info','SubCategoria Restablecida Correctamente');
    }

    public function forcedelete($id)
    {
        Subcategory::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('info','SubCategoria Eliminada Permanentemente');
    }
}
