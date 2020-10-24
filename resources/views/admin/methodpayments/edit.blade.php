@extends('layouts.admin.admin_layout')
@section('title', 'Editar Metodo de pago')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('methodpayments.index')}}">Metodo de pago</a></li>
<li class="breadcrumb-item active">Editar Metodo de pago</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('methodpayments/update',['id' => $methodpayment->id])}}" enctype="multipart/form-data"
                method="post" novalidate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{old('name',$methodpayment->name)}}"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <select name="status" class="form-control" required>
                            @foreach($statuses as $status)
                            <option>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Guardar" class="btn btn-primary float-right mr-5">
                    <a class="btn btn-danger ml-5" href="{{route('methodpayments.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection