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
              <a class="btn btn-success" href="{{route('users.create')}}">Nuevo Registro <i class="fa fa-user"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">

        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
          </tr>
          @foreach ($data as $key => $user)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
              @endforeach
              @endif
            </td>
            <td>
              <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
              <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
              <form action="{{route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
              </form>

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