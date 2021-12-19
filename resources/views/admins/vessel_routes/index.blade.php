@extends('admins.layouts.app')

@section('page-title')
<title>AGN | Vessel Routes</title>
@endsection
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">Vessel Routes</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Vessel Routes</li>
          </ol>
        </div>
        <!-- <div class="col-sm-4">
          <a href="{{ route('admin-vessel-routes.create') }}" class="btn btn-primary float-sm-right">
            <i class="fa fa-plus"></i>
            &nbsp;&nbsp;&nbsp;New Vessel
          </a>
        </div> -->
      </div>
    </div>
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
      <table class="table table-bordered data-table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Vessel</th>
                  <th>From Port</th>
                  <th>Via Port</th>
                  <th>To Port</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
                'url': '{!! route("admin-vessel-routes.data") !!}',
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'from', name: 'from'},
            {data: 'via', name: 'via'},
            {data: 'to', name: 'to'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush