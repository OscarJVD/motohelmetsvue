@extends('layouts.admin.admin_layout')
@section('title', 'Promociones')
@section('breadcrumb')
<li class="breadcrumb-item active">Promociones</li>
@endsection
@section('create')
<a href="promotions/create" class="btn btn-success btn-lg"><i class="fas fa-plus mr-2"></i>Crear</a>
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
                        <th>Fecha Inicia</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>Porcentaje</th>
                        <th>Precio Antes</th>
                        <th>Precio Despues</th>
                        <th>Producto</th>
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
                    @foreach ($promotions as $promotion)
                    <tr>
                        <td scope="row">{{$promotion->id}}</td>
                        <td>{{$promotion->starDate}}</td>
                        <td>{{$promotion->endDate}}</td>
                        <td>{{$promotion->status}}</td>
                        <td>{{$promotion->porcentage}}</td>
                        <td>{{$promotion->priceBefore}}</td>
                        <td>{{$promotion->priceAfter}}</td>
                        <td>{{$promotion->product->name}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-primary  mr-2"
                                    href="{{route('promotions.edit', ['promotion' => $promotion->id])}}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('promotions/destroy', ['id' => $promotion->id])}}"
                                    title="Mover a la Papelera" onclick="return confirm('Esta seguro de mover esta Promoción a la papelera')">
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

