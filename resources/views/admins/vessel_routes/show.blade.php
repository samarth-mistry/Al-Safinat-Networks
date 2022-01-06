@extends('admins.layouts.app')

@section('page-title')
<title>AGN | Edit</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">Edit Route</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-vessel-routes') }}">Vessel Routes</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <a href="{{ url('admin-vessel-routes') }}" class="btn btn-secondary float-sm-right">
            <i class="fa fa-arrow-left"></i>
            &nbsp;&nbsp;&nbsp;Back
          </a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-body">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group row">
            <div class="col-md-3">
                <label>Vessel:</label>
                <input type="text" class="form-control" name="name" value="{{ $vessel->name }}" disabled="true"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
            </div>
        </div>
    </div>
</div>
@endsection
