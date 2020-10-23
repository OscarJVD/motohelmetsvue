@extends('layouts.admin.admin_layout')
@section('title', 'Registrar Orden')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('orders.index')}}">Ordenes</a></li>
<li class="breadcrumb-item active">Registro de Orden</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('orders.store')}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                    <label>Fecha Orden</label>
                    <input type="date" name="dateOrder"  class="form-control" value="{{old('dateOrder')}}" required>
                </div>

                <div class="form-group">
                    <label>Total</label>
                    <input type="number" name="total" class="form-control" value="{{old('total')}}" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="observations" class="form-control" value="{{old('observations')}}" required>
                </div>

                <div class="form-group">
                    <label>persona</label>
                    <select name="person_id" class="form-control" required>
                        @foreach($persons as $person)
                        <option value="{{$person->id}}">{{$person->name}}</option>
                        @endforeach
                    </select>
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
                    <a class="btn btn-danger ml-5" href="{{route('orders.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection