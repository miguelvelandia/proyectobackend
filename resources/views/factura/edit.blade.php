@extends('layouts.layouts')


@section('titulo', 'ACTUALIZACION DE FACTURAS')


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
        <h3 class="box-title">Actualizacion de Facturas</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('factura.update', $factura->id)}}" method="POST">

        <div class="box-body">

          @csrf
          @method('PATCH')

          <div class="form-group">
            <label class="col-sm-2 control-label">Total</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="total" name="total" autocomplete="off" required
                value="{{$factura->total}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Abono</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="abono" name="abono" autocomplete="off" required
                value="{{$factura->abono}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Saldo</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="saldo" name="saldo" autocomplete="off" required
                value="{{$factura->saldo}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="estado" name="estado" autocomplete="off" required
                value="{{$factura->estado}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Orden</label>
            <div class="col-sm-10">
              <select class="form-control select2" style="width: 100%;" id="orden_id" name="orden_id" required>
                <option value=""></option>
                @foreach($ordenes as $orden)
                @if($orden->id == $factura->orden_id)
                <option value="{{$orden->id}}" selected>{{$orden->nombre}}
                </option>
                @else
                <option value="{{$orden->id}}">{{$orden->nombre}}
                </option>
                @endif
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
              <select class="form-control select2" style="width: 100%;" id="empleadoorden_id" name="empleadoorden_id"
                required>
                <option value=""></option>
                @php($valor = 0)
                @foreach($empleadoordenes as $empleadoorden)
                  @php($encontre = 0)
                    @if($factura->empleado_orden->count() <= 1)
                      @foreach($factura->empleado_orden as $detalle)
                        @if($empleadoorden->id == $detalle->pivot->empleado_orden_id)
                          @php($encontre = 1)
                          @php($valor = $detalle->pivot->valor)
                          @break
                        @endif
                      @endforeach

                      @if($encontre == 1)
                        <option value="{{$empleadoorden->id}}" selected>{{$empleadoorden->empleado->nombres}}
                        </option>
                      @else
                        <option value="{{$empleadoorden->id}}">{{$empleadoorden->empleado->nombres}}
                        </option>
                      @endif
                    @else
                      <option value="{{$empleadoorden->id}}">{{$empleadoorden->empleado->nombres}}
                      </option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
              @if($valor != 0)
              <input type="number" class="form-control" id="valor" name="valor" autocomplete="off" required
                value="{{$valor}}">
              @else
              <input type="number" class="form-control" id="valor" name="valor" autocomplete="off" required value="">
              @endif
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