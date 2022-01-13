@extends('admins.layouts.app')

@section('page-title')
<title>AGN | Show</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">View Booking</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-bookings') }}">Bookings</a></li>
            <li class="breadcrumb-item active">Show</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <a href="{{ url('admin-batches') }}" class="btn btn-secondary float-sm-right">
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
      <h5 class="text-green">Booking requestor's information:</h5>
      <div class="mb-15">
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Are you the owner of the transaction?: </label>
              <label class="col-lg-4 col-form-label text-info">{{ $booking->sensitivity == 1 ? 'Yes' : 'No'}}</label>
              <label class="col-lg-2 col-form-label">Date: </label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Requestor's Full Name: </label>
              <label class="col-lg-4 col-form-label text-info">{{ $booking->owner_name }}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Proof ID: </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->proof_id }}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Country: </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->country_id }}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Address: </label>
              <label class="col-lg-6 col-form-label text-info">{{ $booking->source_address }}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Email ID</label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->source_email }}</label>
              <label class="col-lg-2 col-form-label">Contact No.</label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->source_phone }}</label>
          </div>
      </div>
      <h5 class="text-green">Source's Details:</h5>
      <div class="mb-15">
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Unit's Size </label>
              <label class="col-lg-3 col-form-label text-info">TEU (Twenty-foot Equivalent Unit) </label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Source Port Country </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->country_id }}</label>
              <label class="col-lg-3 col-form-label">Source Port </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->source_port_id }}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Date of arrival at port</label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->s_date_of_arrival }}</label>
              <label class="col-lg-3 col-form-label">Port Administrator</label>
              <label class="col-lg-3 col-form-label text-info">-</label>             
          </div>
      </div>
      <h5 class="text-green">Material's Details:</h5>
      <div class="mb-15">
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Type of Material</label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->material_type_id }}</label>
              <label class="col-lg-3 col-form-label">Sensitivity</label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->sensitivity == 1 ? 'Yes' : 'No'}}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Weight </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->weight }} </label>
              <label class="col-lg-3 col-form-label">Dimentions </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->d_l }} x {{ $booking->d_w }} x {{ $booking->d_h }}</label>
          </div>
      </div>
      <h5 class="text-green">Destination's Details:</h5>
      <div class="mb-15">
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Destination Port Country </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->destination_country_id }}</label>
              <label class="col-lg-3 col-form-label">Destination Port </label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->destination_port_id }}</label>
          </div>
          <div class="form-group row">
              <label class="col-lg-3 col-form-label text-right">Approx of arrival at destination port</label>
              <label class="col-lg-3 col-form-label text-info">{{ $booking->d_date_of_arrival_approx }}</label>
              <label class="col-lg-3 col-form-label">Final Destination Details</label>
              <label class="col-lg-6 col-form-label text-info">{{ $booking->destination_address }}</label>
          </div>
      </div>
  </div>
  <div class="card-footer" style="background: khaki;">
    <a href="{{ route('admin-bookings.index') }}" class="btn btn-secondary">Back</a>
  </div>
</div>
@endsection
