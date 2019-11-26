@extends('layouts.layouts')


@section('titulo', 'ROL')


@section('content')



<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Role</h3>
      </div>
      <div class="box-body">
        <!-- /.box-body -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }}</label>
                    @endforeach
                @endif
            </div>
        </div>

      </div>
    </div>
    <!-- /.box -->
  </div>
</div>


@endsection