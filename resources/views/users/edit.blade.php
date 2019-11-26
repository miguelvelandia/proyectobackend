@extends('layouts.layouts')


@section('titulo', 'ACTUALIZACION DE USER')


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
        <h3 class="box-title">Actualizacion de Usuarios</h3>


      </div>
      <!-- /.box-header -->
      <form class="form-horizontal" action="{{route('users.update', $user->id)}}" method="POST">

        <div class="box-body">

          @csrf
          @method('PATCH')

          <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="nombre"
                        placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control" id="nombre"
                        placeholder="Email">
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
                    <input type="password" name="confirm-password" class="form-control" id="nombre"
                        placeholder="Confirm Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select multiple name="roles[]" class="form-control">
                        @foreach($roles as $rol)
                         @php($encontre=0)
                            @foreach($userRoles as $UserRol)
                            @if($rol->name==$UserRol)
                            @php($encontre=1)
                            @break
                            @endif
                            @endforeach
                        
                        @if($encontre==1)
                          <option value='{{$rol->name}}' selected>{{$rol->name}}</option>
                        @else 
                          <option value='{{$rol->name}}' >{{$rol->name}}</option>
                        @endif
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
