@extends('layouts.layouts')


@section('titulo', 'ACTUALIZACION DE SERVICIOS ESPECIALES')


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
        <h3 class="box-title">Actualizar Servicios Especiales</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('especial.update', $especial->id)}}" method="POST">

        <div class="box-body">

          @csrf
          @method('PATCH')

          <div class="form-group">
            <label class="col-sm-2 control-label">Cliente</label>
            <div class="col-sm-10">
              <select class="form-control select2" style="width: 100%;" id="cliente_id" name="cliente_id">
                <option value=""></option>
                @foreach($clientes as $cliente)
                @if ($cliente->id == $especial->cliente_id)
                <option value="{{$cliente->id}}" selected>{{$cliente->nombres}}
                </option>
                @else
                <option value="{{$cliente->id}}">{{$cliente->nombres}}
                </option>
                @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Servicio</label>
            <div class="col-sm-10">
              <select class="form-control select2" style="width: 100%;" id="servicio_id" name="servicio_id">
                <option value=""></option>
                @foreach($servicios as $servicio)
                @if ($servicio->id == $especial->servicio_id)
                <option value="{{$servicio->id}}" selected>{{$servicio->nombre}}
                  </option>
                @else
                <option value="{{$servicio->id}}">{{$servicio->nombre}}
                  </option>
                @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Precio</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="precio" name="precio" autocomplete="off" value="{{$especial->precio}}">
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