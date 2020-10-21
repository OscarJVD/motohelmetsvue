@extends('layouts.admin.admin_layout')
@section('title', 'Marcas')
@section('breadcrumb')
<li class="breadcrumb-item active">Marcas</li>
@endsection
@section('create')
<a href="brands/create" class="btn btn-success btn-lg"><i class="fas fa-plus mr-2"></i>Crear</a>
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
                    @foreach ($brands as $brand)
                    <tr>
                        <td scope="row">{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->status}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-primary ml-3 mr-2"
                                    href="{{route('brands.edit', ['brand' => $brand->id])}}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('brands/destroy', ['id' => $brand->id])}}"
                                    title="Mover a la Papelera" onclick="return confirm('Esta seguro de mover esta Marca a la papelera')">
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