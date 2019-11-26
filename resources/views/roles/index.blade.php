@extends('layouts.layouts')


@section('titulo', 'LISTADO DE ROLES')


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
        <h3 class="box-title">Listados Roles</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">

            <div class="input-group-btn">
              <a class="btn btn-success" href="{{route('roles.create')}}">Nuevo Registro <i class="fa fa-user"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">

        <table class="table table-bordered">
          <tr>
            <th>#</th>
            <th>Rol</th>
            <th width="280px">Accion</th>
          </tr>
          @foreach ($roles as $key => $role)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
              <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
              @can('role-edit')
              <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
              @endcan
              @can('role-delete')
              <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>
              @endcan

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