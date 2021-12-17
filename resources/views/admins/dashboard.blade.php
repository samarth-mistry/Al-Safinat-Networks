@extends('admins.layouts.app')

@section('page-title')
<title>Admin Dashboard</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0">Admin Dashboard</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="card card-info card-outline bg-dark">
          <div class="card-body">
            <h5 class="card-title"><a class="text-info" href="{{ route('logout') }}">Logout</a></h5>
            <p class="card-text font-weight-bold">
              Welcome Superadmin
            </p>
            <a href="#" class="text-info card-link">Card link</a>
            <a href="#" class="text-info card-link">Another link</a>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
      <div class="col-lg-4">
        <div class="card card-info card-outline bg-warning  ">
          <div class="card-body">
            <h5 class="card-title text-warning"><a href="">Tasks</a></h5>
            <p class="card-text">
              <ul>
                <li>Task 1</li>
                <li>Task 2</li>
                <li>Task 3</li>
                <li>Task 4</li>
              </ul>
            </p>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
      <div class="col-lg-4">
        <div class="card card-info card-outline bg-warning">
          <div class="card-body">
            <h5 class="card-title"><a class="text-info" href="">News</a></h5>
            <p class="card-text font-weight-bold">
              Welcome Superadmin
            </p>
            <a href="#" class="text-info card-link">Card link</a>
            <a href="#" class="text-info card-link">Another link</a>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
      <div class="col-lg-8">
        <div class="card card-info card-outline bg-dark  ">
          <div class="card-body">
            <h5 class="card-title text-warning"><a class="text-warning" href="">Messages</a></h5>
            <p class="card-text">
              <ul>
                <li>From chat Arbella, UK : we all have done the migration.....</li>
                <li>From chat Scott, DEN : hey there!</li>
                <li>From chat Al-Faruz, SA : tasks completed</li>
                <li>From chat Jalal, PK : ship is rocking</li>
              </ul>
            </p>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->
@endsection
