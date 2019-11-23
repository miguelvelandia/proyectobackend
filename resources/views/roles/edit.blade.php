@extends('layouts.layouts')


@section('titulo', 'ACTUALIZACION DE ROL')


@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Tenemeos errores con los siguientes campos.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif



<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Registro de Roles</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal"  method="POST" action="{{ route('roles.update', ['id' => $role->id])}}">

        <div class="box-body">

          @csrf
          @method('PATCH')

          <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control" id="name"
                        placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
    
                    @foreach($permission as $value)
                    @php($encontre=0)
                    @foreach($rolePermissions as $value2)
                    @if($value->id==$value2)
                    @php($encontre=1)
                    @break
                    @endif
                    @endforeach
                    @if($encontre==1)
                    <input type="checkbox" name="permission[]"  value={{$value->id}} checked> {{ $value->name }}</label>
                    <br />
                    @else
                    <input type="checkbox" name="permission[]" value={{$value->id}}> {{ $value->name }}</label>
                    <br />
                    @endif
                    @endforeach
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
