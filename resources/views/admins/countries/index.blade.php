@extends('admins.layouts.app')

@push('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush
@section('page-title')
<title>AGN | Countries</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">Countries</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Countries</li>
          </ol>
        </div>
        <div class="col-sm-4">
          <a href="{{ route('admin-countries.create') }}" class="btn btn-primary float-sm-right">
            <i class="fa fa-plus"></i>
            &nbsp;&nbsp;&nbsp;New Country
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
                  <th>Name</th>
                  <th>Abbrevation</th>
                  <th>Continent</th>
                  <th>Action</th>
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
                'url': '{!! route("admin-countries.data") !!}',
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'abbr', name: 'abbr'},
            {data: 'continent', name: 'continent'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush