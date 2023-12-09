@extends('layouts.admin')
@section('contenido')
<!-- left column -->
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar marca: {{ $marca->marca }} </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('marca.update', $marca->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>   
                    <input type="text" class="form-control" name="marca" id="marca" value="{{$marca->marca}}" placeholder="Marca de carro">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Actualizar</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<!-- /.row -->
@endsection 