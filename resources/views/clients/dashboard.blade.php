@extends('clients.layouts.app')
@push('styles')<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">@endpush
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary mb-3 card-outline border-primary bg-dark">
            <div class="card-body">
                <h3 class="text-light">Welcome!</h3><h4> to {{ config('app.name') }} <span class="text-info">Networks</span></h4>
            </div>
        </div><!-- /.card -->
    </div>
    <div class="col-lg-6">
        <div class="card card-primary mb-3 card-outline border-warning bg-dark">
            <div class="card-body">
                <h3 class="text-light">Sample DashBoard</h3>
            </div>
        </div><!-- /.card -->
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary card-outline bg-secondary">
            <div class="card-body">
            <h5 class="card-title"><a href="{{ route('logout') }}" class="text-warning">Logout</a></h5>
            <p class="card-text">
                This is Clients DashBoard, Should show the pricings, bookings, tracking and welcome messages
            </p>
            <a href="#" class="card-link text-warning">Card link</a>
            <a href="#" class="card-link text-warning">Another link</a>
            </div>
        </div>
    </div>
</div>
@endsection
