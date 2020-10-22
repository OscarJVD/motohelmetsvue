@extends('layouts.admin.admin_layout')
@section('title', 'Productos')
@section('breadcrumb')
<li class="breadcrumb-item active">Productos</li>
@endsection
@section('create')
<a href="products/create" class="btn btn-success btn-lg"><i class="fas fa-plus mr-2"></i>Crear</a>
@endsection
@section('content')
<!-- Main page content-->
<div class="container mt-n10">
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="row">Cod. Barras</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th>Marca</th>
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
                    @foreach ($products as $product)
                    <tr>
                        <td scope="row">{{$product->barcode}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td><img src="{{ url('img/productos/'.$product->images) }}" width="60rem" alt=""></td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-warning ml-3 mr-2"
                                    href="" title="Descripcion">
                                    <i class="fas fa-clipboard"></i>
                                </a>
                                <a class="btn btn-primary  mr-2"
                                    href="{{route('products.edit', ['product' => $product->id])}}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('products/destroy', ['id' => $product->id])}}"
                                    title="Mover a la Papelera" onclick="return confirm('Esta seguro de mover esta Producto a la papelera')">
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