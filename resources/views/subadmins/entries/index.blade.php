@extends('admins.layouts.app')

@push('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush
@section('page-title')
<title>AGN | Trackings</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">Trackings</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Trackings</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <a href="{{ route('admin-trackings.create') }}" class="btn btn-primary float-sm-right">
            <i class="fa fa-plus"></i>
            &nbsp;&nbsp;&nbsp;New Entry
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
      <table class="table table-bordered data-table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Tracking #</th>
                  <th>Batch #</th>
                  <th>Vessel</th>
                  <th>Current port</th>
                  <th>Next port</th>
                  <th>Time of arrival</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
          </thead>
      </table>
    </div>
</div>
@endsection
@push('scripts')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
                'url': '{!! route("admin-trackings.data") !!}',
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'batch', name: 'batch'},
            {data: 'vessel', name: 'vessel'},
            {data: 'curr_port', name: 'curr_port'},
            {data: 'next_port', name: 'next_port'},
            {data: 'time', name: 'time'},
            {data: 'status', name: 'status'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush