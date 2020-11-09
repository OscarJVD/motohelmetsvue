@extends('layouts.admin.admin_layout')
@section('title', 'Papelera de Orden')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('orders.index')}}">Orden</a></li>
<li class="breadcrumb-item active">Papelera de Ordenes</li>
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
                    @foreach ($orders as $order)
                    <tr>
                        <td scope="row">{{$order->id}}</td>
                        <td>{{$order->dateOrder}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->observations}}</td>
                        <td>{{$order->person_id}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->deleted_at}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success ml-3 mr-2" href="{{route('orders/restore', ['id' => $order->id])}}"
                                    title="Restablecer">
                                    <i class="fas fa-sync-alt"></i>
                                </a>

                                <a class="btn btn-danger" href="{{route('orders/force', ['id' => $order->id])}}" title="Eliminar Permanentemente" onclick="return confirm('Esta seguro de eliminar permanentemente esta Orden')">
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