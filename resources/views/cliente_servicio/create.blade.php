@extends('layouts.layouts')


@section('titulo', 'REGISTRO DE SERVICIOS ESPECIALES')


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
        <h3 class="box-title">Registro de Servicios Especiales</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('especial.store')}}" method="POST">

        <div class="box-body">

          @csrf

          <div class="form-group">
                <label class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-10">
                  <select class="form-control select2" style="width: 100%;" id="cliente_id" name="cliente_id">
                    <option value=""></option>
                    @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombres}}
                    </option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="form-group">
                    <label class="col-sm-2 control-label">Servicio</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" id="servicio_id" name="servicio_id" >
                        <option value=""></option>
                        @foreach($servicios as $servicio)
                        <option value="{{$servicio->id}}">{{$servicio->nombre}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="precio" name="precio" value="{{old('precio')}}"
                            autocomplete="off">
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
