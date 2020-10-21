@extends('layouts.admin.admin_layout')
@section('title', 'Papelera de Materia')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('brands.index')}}">Materias</a></li>
<li class="breadcrumb-item active">Papelera de Materia</li>
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
                    @foreach ($brands as $brand)
                    <tr>
                        <td scope="row">{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->status}}</td>
                        <td>{{$brand->deleted_at}}</td>
                        <td>
                            <div class="row">
                                <a class="btn btn-success ml-3 mr-2" href="{{route('brands/restore', ['id' => $brand->id])}}"
                                    title="Restablecer">
                                    <i class="fas fa-sync-alt"></i>
                                </a>

                                <a class="btn btn-danger" href="{{route('brands/force', ['id' => $brand->id])}}" title="Eliminar Permanentemente" onclick="return confirm('Esta seguro de eliminar permanentemente esta Marca')">
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