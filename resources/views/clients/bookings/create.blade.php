@extends('clients.layouts.app')
@push('styles')<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">@endpush
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header flex-wrap border-0 pt-4 pb-0">
                <div class="card-title">
                    <h3 class="card-label">New Booking
                </div>
            </div>
            @include('clients.bookings.fields')
        </div><!-- /.card -->
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->
@endsection
