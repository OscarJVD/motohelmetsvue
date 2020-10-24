@extends('layouts.admin.admin_layout')
@section('title', 'Papelera de Promociones')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('promotions.index')}}">Promociones</a></li>
<li class="breadcrumb-item active">Papelera de Promociones</li>
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
                        <th>Fecha Incio</th>
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
                        <td>{{$promotion->priceBefore}}</td>
                        <td>{{$promotion->priceAfter}}</td>
                        <td>{{$promotion->product->name}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success ml-3 mr-2" href="{{route('promotions/restore', ['id' => $promotion->id])}}" title="Restablecer">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            
                                <a class="btn btn-danger" href="{{route('promotions/force', ['id' => $promotion->id])}}" title="Eliminar Permanentemente"
                                    onclick="return confirm('Esta seguro de eliminar permanentemente esta Promoción')">
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