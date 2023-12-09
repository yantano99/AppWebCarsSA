@extends('layouts.admin')
@section('contenido')
<!-- left column -->
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nuevo cliente</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('cliente.store') }}" method="POST" class="form">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="cedula">Cédula</label>   
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="cedula" id="cedula" placeholder="Cédula del cliente">
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre del cliente">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos del cliente">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección del cliente">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="telefono" id="telefono" placeholder="Telefono del cliente">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                </div>
            </div>
        </form>
    </div> 
    <!-- /.card -->
</div>
<!-- /.row -->
@endsection 