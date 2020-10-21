@extends('layouts.admin.admin_layout')
@section('title', 'Papelera de SubCategoria')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('categories.index')}}">SubCategorias</a></li>
<li class="breadcrumb-item active">Papelera de SubCategoria</li>
@endsection
@section('content')
<!-- Main page content-->
<div class="container mt-n10">
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="row">Id</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Fecha Eliminacion</th>
                        <th>Aciones</th>
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot> --}}
                <tbody>
                    @foreach ($subcategories as $subcategory)
                    <tr>
                        <td scope="row">{{$subcategory->id}}</td>
                        <td>{{$subcategory->name}}</td>
                        <td>{{$subcategory->category->name}}</td>
                        <td>{{$subcategory->status}}</td>
                        <td>{{$subcategory->deleted_at}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success ml-3 mr-2" href="{{route('subcategories/restore', ['id' => $subcategory->id])}}"
                                    title="Restablecer">
                                    <i class="fas fa-sync-alt"></i>
                                </a>

                                <a class="btn btn-danger" href="{{route('subcategories/force', ['id' => $subcategory->id])}}" title="Eliminar Permanentemente" onclick="return confirm('Esta seguro de eliminar permanentemente esta SubCategoria')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection