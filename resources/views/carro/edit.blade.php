@extends('layouts.admin')
@section('contenido')
<!-- left column -->
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar carro: {{ $carro->descripcion }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('carro.update', $carro->placa) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="placa">Placa</label>   
                            <input type="text" class="form-control" name="placa" id="placa" value="{{ $carro->placa}}" placeholder="Placa del carro">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $carro->descripcion}}" placeholder="Descripción del carro">
                        </div>
                    </div>  
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo" value="{{ $carro->modelo}}" placeholder="Modelo del carro">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="num_chasis">Número chasis</label>
                            <input type="text" class="form-control" name="num_chasis" id="num_chasis" value="{{ $carro->num_chasis}}" placeholder="Número del chasis del carro">
                        </div>
                    </div>  
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="num_motor">Número motor</label>
                            <input type="text" class="form-control" name="num_motor" id="num_motor" value="{{ $carro->num_motor}}" placeholder="Número del motor del carro">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Marca</label>
                            <select name="marca" class="form-control" id="marca">
                                @foreach ($marca as $mar)
                                @if ($mar->id==$carro->marca)
                                <option value="{{$mar->id}}">{{$mar->marca}}</option>
                                @else
                                <option value="{{$mar->id}}">{{$mar->marca}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="cliente" class="form-control" id="cliente">
                                @foreach ($cliente as $cli)
                                @if ($cli->cedula==$carro->cliente)
                                <option value="{{$cli->cedula}}">{{$cli->nombres}} {{$cli->apellidos}}</option>
                                @else
                                <option value="{{$cli->cedula}}">{{$cli->nombres}} {{$cli->apellidos}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div> 
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