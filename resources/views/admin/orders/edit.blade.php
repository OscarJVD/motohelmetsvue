@extends('layouts.admin.admin_layout')
@section('title', 'Editar Orden')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('orders.index')}}">Ordenes</a></li>
<li class="breadcrumb-item active">Editar Orden</li>
@endsection
@section('content')
<div class="container mt-n10">
    <div class="card">
        <div class="card-body">
            <form action="{{route('orders/update',['id' => $order->id])}}" method="post" novalidate>
                @csrf
                <div class="form-group"> 
                    <label>Fecha Orden</label>
                    <input type="date" name="dateOrder"  class="form-control" value="{{old('dateOrder',$order->dateOrder)}}" required>
                </div>

                <div class="form-group">
                    <label>Total</label>
                    <input type="number" name="total" class="form-control" value="{{old('total',$order->total)}}" required>
                </div>

                <div class="form-group">
                    <label>Observaciones</label>
                    <input type="text" name="observations" class="form-control" value="{{old('observations',$order->observations)}}" required>
                </div>

                <div class="form-group">
                    <label>Cliente</label>
                    <select name="person_id" class="form-control" required>
                        @foreach($persons as $person)
                        @if($person == $order->person)
                            <option selected value="{{$person->id}}">{{$person->name}}</option>
                            @else
                            <option value="{{$person->id}}">{{$person->name}}</option>
                            @endif                          
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <select name="status" class="form-control" required>
                        @foreach($statuses as $status)
                        @if($status == $order->status)
							<option selected>{{$status}}</option>
							@else
							<option>{{$status}}</option>
							@endif							
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