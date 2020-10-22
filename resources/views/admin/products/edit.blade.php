@extends('layouts.admin.admin_layout')
@section('title', 'Editar Producto')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
<li class="breadcrumb-item active">Editar Producto</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('products/update',['id' => $product->id])}}" enctype="multipart/form-data"
                method="post" novalidate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Codigo de Barras</label>
                        <input type="number" name="barcode" class="form-control"
                            value="{{old('barcode',$product->barcode)}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Precio</label>
                        <input type="number" name="price" class="form-control" value="{{old('price',$product->price)}}"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <select name="status" class="form-control" required>
                            @foreach($statuses as $status)
                            <option>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="features" rows="3">
                            {{old('features',$product->features)}}
                        </textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Cantidad</label>
                        <input type="number" name="quantity" class="form-control"
                            value="{{old('quantity',$product->quantity)}}" required>
                    </div>
                    <div class="col-md-1">
                        <img src="{{ url('img/productos/'.$product->images) }}" width="60rem" alt="">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Imagen</label><br>
                        <input type="file" name="images" accept="image/*" value="{{old('images',$product->images)}}"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Marcas</label>
                        <select name="brand_id" class="form-control" required>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}"> {{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>SubCategoria</label>
                        <select name="subcategory_id" class="form-control" required>
                            @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Guardar" class="btn btn-primary float-right mr-5">
                    <a class="btn btn-danger ml-5" href="{{route('products.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection