@extends('layouts.admin.admin_layout')
@section('title', 'Registrar Categoria')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
<li class="breadcrumb-item active">Registro Categoria</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <select name="status" class="form-control" required>
                        @foreach($statuses as $status)
                        <option>{{$status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Guardar" class="btn btn-primary float-right mr-5">
                    <a class="btn btn-danger ml-5" href="{{route('categories.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection