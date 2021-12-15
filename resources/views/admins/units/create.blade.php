@extends('admins.layouts.app')

@section('page-title')
<title>AGN | Create</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">New Unit</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-units') }}">Units</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <a href="{{ url('admin-units') }}" class="btn btn-secondary float-sm-right">
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
    <form method="POST" action="{{ route('admin-units.store') }}">
        @csrf
        @include('admins.units.fields')
    </form>
</div>
@endsection
