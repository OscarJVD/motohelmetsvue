@extends('layouts.admin.admin_layout')
@section('title', 'Editar Promoción')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('promotions.index')}}">Promociones</a></li>
<li class="breadcrumb-item active">Editar Promoción</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('promotions/update',['id' => $promotion->id])}}" enctype="multipart/form-data"
                method="post" novalidate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha Inicio</label>
                        <input type="date" name="starDate" class="form-control"
                            value="{{old('starDate',$promotion->starDate)}}" required>
                    </div>

                     <div class="form-group col-md-6">
                        <label>Fecha Fin</label>
                        <input type="date" name="endDate" class="form-control"
                            value="{{old('endDate',$promotion->endDate)}}" required>
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
                        <label>Porcentaje</label>
                        <input type="number" name="porcentage" class="form-control" value="{{old('porcentage',$promotion->porcentage)}}"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Precio Antes</label>
                        <input type="number" name="priceBefore" class="form-control" value="{{old('priceBefore',$promotion->priceBefore)}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Precio Despues</label>
                        <input type="number" name="priceAfter" class="form-control" value="{{old('priceAfter',$promotion->priceAfter)}}" required>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Productos</label>
                        <select name="product_id" class="form-control" required>
                            @foreach($products as $product)
                            <option value="{{$product->id}}"> {{$product->name}}</option>
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