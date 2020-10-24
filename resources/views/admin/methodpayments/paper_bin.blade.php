@extends('layouts.admin.admin_layout')
@section('title', 'Papelera de Metodos de pago')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('methodpayments.index')}}">Metodos de pago</a></li>
<li class="breadcrumb-item active">Papelera de Metodos de pago</li>
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
                    @foreach ($methodpayments as $methodpayment)
                    <tr>
                        <td scope="row">{{$methodpayment->id}}</td>
                        <td>{{$methodpayment->name}}</td>
                        <td>{{$methodpayment->status}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success ml-3 mr-2" href="{{route('methodpayments/restore', ['id' => $methodpayment->id])}}" title="Restablecer">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            
                                <a class="btn btn-danger" href="{{route('methodpayments/force', ['id' => $methodpayment->id])}}" title="Eliminar Permanentemente"
                                    onclick="return confirm('Esta seguro de eliminar permanentemente este metodo de pago')">
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
