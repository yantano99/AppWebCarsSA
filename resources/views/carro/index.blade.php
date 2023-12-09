@extends ('layouts.admin')
@section ('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">CARROS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Carros</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('carro.index') }}" method="get">

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" name="texto" placeholder="Buscar carros" value="{{$texto}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                        <a href="{{ route('carro.create') }}" class="btn btn-success">Nuevo carro</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <!-- table hover -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Placa</th>
                                    <th>Descripción</th>
                                    <th>Modelo</th>
                                    <th>Número chasis</th>
                                    <th>Número motor</th>
                                    <!--th>Marca</th>-->
                                    <!--<th>Cliente</th>-->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carro as $car)
                                <tr>
                                    <td>{{ $car->placa}}</td>
                                    <td>{{ $car->descripcion}}</td>
                                    <td>{{ $car->modelo}}</td>
                                    <td>{{ $car->num_chasis}}</td>
                                    <td>{{ $car->num_motor}}</td>
                                    <!--<td>{{ $car->marca}}</td>-->
                                    <!--<td>{{ $car->nombres}} {{ $car->apellidos}}</td>-->
                                    <td>
                                        <abbr title="Editar"><a href="{{ route('carro.edit', $car->placa) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a></abbr>
                                        <!-- Button trigger for danger theme modal -->
                                        <abbr title="Eliminar"><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $car->placa }}"><i class="fas fa-trash-alt"></i></button></abbr>
                                    </td>

                                </tr>
                                @include('carro.modal')
                                @endforeach
                            </tbody>
                        </table>
                        {{ $carro->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hoverable rows end -->

@endsection