@extends('layouts.admin.admin_layout')
@section('title', 'Registrar Promoción')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('promotions.index')}}">Promoción</a></li>
<li class="breadcrumb-item active">Registro Promoción</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('promotions.store')}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha Inicial</label>
                        <input type="date" name="starDate" class="form-control" value="{{old('starDate')}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha Final</label>
                        <input type="date" name="endDate" class="form-control" value="{{old('endDate')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <select name="status" class="form-control" required>
                            @foreach($statuses as $status)
                            <option>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>porcentaje</label>
                        <input type="number" name="porcentage" class="form-control" value="{{old('porcentage')}}" required>
                    </div>

                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Precio Antes</label>
                        <input type="number" name="priceBefore" class="form-control" value="{{old('priceBefore')}}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Precio Despues</label>
                        <input type="number" name="priceAfter" class="form-control" value="{{old('priceAfter')}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Producto</label>
                        <select name="product_id" class="form-control" required>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Guardar" class="btn btn-primary float-right mr-5">
                    <a class="btn btn-danger ml-5" href="{{route('promotions.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
