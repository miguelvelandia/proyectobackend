@extends('layouts.layouts')


@section('titulo', 'ACTUALIZAR DE SERVICIOS')


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
        <h3 class="box-title">Actualizar de Cliente</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('cliente.update', $cliente->id)}}" method="POST">

        <div class="box-body">

          @csrf
          @method('PATCH')

          <div class="form-group">
            <label class="col-sm-2 control-label">Nombre Cliente</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombres" name="nombres"
            autocomplete="off" required value="{{$cliente->nombres}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Direccion</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="direccion" name="direccion"
                autocomplete="off" required >{{$cliente->direccion}}</textarea>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Telefono</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telefono" name="telefono"
                autocomplete="off" required value="{{$cliente->telefono}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email"
                autocomplete="off" required value="{{$cliente->email}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Especial</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="especial" name="especial"
                autocomplete="off" required value="{{$cliente->especial}}">
            </div>
          </div>


        
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-default pull-right">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>


@endsection
