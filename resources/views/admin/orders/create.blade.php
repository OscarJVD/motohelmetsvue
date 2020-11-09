@extends('layouts.admin.admin_layout')
@section('title', 'Registrar Orden')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('orders.index')}}">Ordenes</a></li>
<li class="breadcrumb-item active">Registro de Orden</li>
@endsection
@section('content')
        <order url="{{ $url }}" :persons="{{ $persons}}" :products="{{$products}}"></order>
@endsection
