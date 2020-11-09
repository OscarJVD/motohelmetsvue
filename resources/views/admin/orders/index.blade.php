@extends('layouts.admin.admin_layout')
@section('title', 'Ordenes de venta')
@section('breadcrumb')
<li class="breadcrumb-item active">Ordenes</li>
@endsection
@section('create')
<a href="orders/create" class="btn btn-success btn-lg"><i class="fas fa-plus mr-2"></i>Crear</a>
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
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>observaciones</th>
                        <th>Cliente</th>
                        <th>Productos</th>
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
                    @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{$order->id}}</td>
                        <td>{{$order->dateOrder}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->observations}}</td>
                        <td>{{$order->person->name}}</td>
                            
                        <td>{{$order->status}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-primary ml-3 mr-2"
                                    href="{{route('orders.edit', ['order' => $order->id])}}" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('orders/destroy', ['id' => $order->id])}}"
                                    title="Mover a la Papelera" onclick="return confirm('Esta seguro de mover esta Orden a la papelera')">
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