@extends('layouts.layouts')


@section('titulo', 'REGISTRO DE FACTURAS')


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
        <h3 class="box-title">Registro de Facturas</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('factura.store')}}" method="POST">

        <div class="box-body">

          @csrf

          <div class="form-group">
            <label class="col-sm-2 control-label">Total</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="total" name="total"
                autocomplete="off" value="{{old('total')}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Abono</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="abono" name="abono"
                autocomplete="off"  value="{{old('abono')}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Saldo</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="saldo" name="saldo"
                autocomplete="off" value="{{old('saldo')}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="estado" name="estado"
                autocomplete="off" value="{{old('estado')}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Orden</label>
            <div class="col-sm-10">
              <select class="form-control select2" style="width: 100%;" id="orden_id" name="orden_id">
                <option value=""></option>
                @foreach($ordenes as $orden)
                <option value="{{$orden->id}}">{{$orden->nombre}}
                </option>
                @endforeach
              </select>
            </div>
        </div>

          
          <hr>
            <h1>Registrar Detalle</h1>
          <hr>

          <div class="form-group">
            <label class="col-sm-2 control-label">Empleado Orden</label>
            <div class="col-sm-10">
              <select class="form-control select2" style="width: 100%;" id="empleadoorden_id" name="empleadoorden_id">
                <option value=""></option>
                @foreach($empleadoordenes as $empleadoorden)
                <option value="{{$empleadoorden->id}}">{{$empleadoorden->empleado->nombres}}
                </option>
                @endforeach
              </select>
            </div>
        </div>

          
          <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="valor" name="valor"
                autocomplete="off"  value="{{old('valor')}}">
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
