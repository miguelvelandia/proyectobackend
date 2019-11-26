@extends('layouts.layouts')


@section('titulo', 'ACTUALIZACION DE SERVICIOS')


@section('content')


<div class="row">
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> Tienes errores en estos campos!.<br><br>
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          </ul>
      </div>
  @endif
</div>



<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Actualizacion de Servicios</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('servicio.update', $servicio->id)}}" method="POST">

        <div class="box-body">

          @csrf
          @method('PATCH')

          <div class="form-group">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
            <input type="hidden" id="idcategoria" name="idcategoria" value="{{$servicio->categoria->id}}">
                <input type="text" class="form-control" id="nombre" name="nombre"
            autocomplete="off" required value="{{$servicio->categoria->nombre}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="descripcion" name="descripcion"
                autocomplete="off" required>{{$servicio->categoria->descripcion}}</textarea>
            </div>
          </div>

          <hr>
            <h1>Actualizar Servicio</h1>
          <hr>

          <div class="form-group">
            <label class="col-sm-2 control-label">Servicio</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="servicio" name="servicio"
            autocomplete="off" required value="{{$servicio->nombre}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio"
                autocomplete="off" required>{{$servicio->descripcion}}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Precio</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="precio" name="precio"
                autocomplete="off" required value="{{$servicio->precio}}">
            </div>
          </div>


        
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-default pull-right">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>


@endsection
