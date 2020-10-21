@extends('layouts.admin.admin_layout')
@section('title', 'Papelera de Categoria')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
<li class="breadcrumb-item active">Papelera de Categoria</li>
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
                    @foreach ($categories as $category)
                    <tr>
                        <td scope="row">{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->status}}</td>
                        <td>{{$category->deleted_at}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success ml-3 mr-2" href="{{route('categories/restore', ['id' => $category->id])}}"
                                    title="Restablecer">
                                    <i class="fas fa-sync-alt"></i>
                                </a>

                                <a class="btn btn-danger" href="{{route('categories/force', ['id' => $category->id])}}" title="Eliminar Permanentemente" onclick="return confirm('Esta seguro de eliminar permanentemente esta Categoria')">
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