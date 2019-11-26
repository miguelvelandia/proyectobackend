@extends('layouts.layouts')


@section('titulo', 'LISTADO DE SERVICIO')


@section('content')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i> Exito!</h4>
  {{session('success')}}.
</div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Listados Servicio</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">

            <div class="input-group-btn">
            <a class="btn btn-success" href="{{route('servicio.create')}}">Nuevo Registro <i class="fa fa-user"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Servicio</th>
            <th class="text-center">Categoria</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
          </tr>
          @foreach ($servicios as $servicio)
          <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{$servicio->nombre}}</td>
            <td class="text-center">{{$servicio->categoria->nombre}}</td>
            <td class="text-center">
                <a class="btn btn-info btn-sm" href="{{route('servicio.edit', $servicio->id)}}">Editar</a>
            </td>
            <td class="text-center">
                <form action="{{route('servicio.destroy', $servicio->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                  </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>




@endsection

