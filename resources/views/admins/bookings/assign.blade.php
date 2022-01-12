@extends('admins.layouts.app')

@section('page-title')
<title>AGN | Assign</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">Assign Unit</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-bookings.index') }}">Booking</a></li>
            <li class="breadcrumb-item active">Assign Unit</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <a href="{{ url('admin-bookings/index') }}" class="btn btn-secondary float-sm-right">
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
    <form method="POST" action="{{ route('admin-bookings-unit.update', $booking->id) }}">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Booking: <label class="text-primary">{{$booking->owner_name}} | {{$booking->source_email}}</label></h3>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Tracking ID <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tracking_id" value="{{ $booking->tracking_id }}"/>
                </div>
                <div class="col-md-6">
                    <label>Unit <span class="text-danger">*</span></label>
                    <select name="unit_id" id="unit_id" class="form-control">
                        <option value="">--Select Unit--</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ $bk_unt->unit_id == $unit->id ? 'selected':'' }}>{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer" style="background: khaki;">
            <button type="submit" class="btn btn-primary mr-2">Save</button>
            <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
            <a href="{{ route('admin-bookings.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $("#unit_id").select2({});
    });
</script>
@endpush
