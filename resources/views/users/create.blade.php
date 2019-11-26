@extends('layouts.layouts')


@section('titulo', 'REGISTRO DE USER')


@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> Hay error en algunos de estos campos.<br><br>
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
        <h3 class="box-title">Registro de Usuarios</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('users.store')}}" method="POST">

        <div class="box-body">

          @csrf

          <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" id="nombre" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" id="nombre" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" id="nombre" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                     <input type="password" name="confirm-password" class="form-control" id="nombre" placeholder="Confirm Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                     <select multiple name="roles[]" class="form-control">
                    @foreach($roles as $rol)
                           <option value='{{$rol->name}}'>{{$rol->name}}</option>
                    @endforeach
    
                    </select>
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
