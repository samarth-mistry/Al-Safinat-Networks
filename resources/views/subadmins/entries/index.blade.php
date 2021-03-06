@extends('admins.layouts.app')

@push('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush
@section('page-title')
<title>AGN | Port Monitoring</title>
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          <h1 class="m-0">Port Monitoring</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Admin</a></li>
            <li class="breadcrumb-item active">Port Monitoring</li>
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
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form action="">
<div class="mb-15">
    <div class="row">
        <label class="col-form-label col-md-4 text-right">Select the Port</label>
        @if($is_port_admin == 0)
        <div class="col-md-3">
          <select name="port_id" id="port_id" class="form-control">
            @foreach($ports as $port)
            <option value="{{ $port->id }}">{{ $port->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-primary" id="view_port">View</button>
        </div>
        @else
        <div class="col-md-3">
          <select name="port_id" id="port_id" class="form-control" disabled="true">
            @foreach($ports as $port)
            <option value="{{ $port->id }}" {{ $port->id == $is_port_admin ? 'selected' : ''}}>{{ $port->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-primary" id="view_port" disabled="true">View</button>
        </div>
        @endif
    </div>
</div><br>
<div class="card card-success card-outline" style="background: #e8f5e6;">
    <div class="card-header">
      <h4 class="text-center font-weight-bold text-success">Incoming Vessels</h4>
    </div>
    <div class="card-body">
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
<div class="card card-danger card-outline" style="background: #ffedf2;">
    <div class="card-header">
      <h4 class="text-center font-weight-bold text-danger">Outgoing Vessels</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered data-table-outgoing">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Tracking #</th>
                  <th>Batch #</th>
                  <th>Vessel</th>
                  <th>From port</th>
                  <th>Current port</th>
                  <th>Time of arrival</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
          </thead>
      </table>
    </div>
</div>
</form>
@endsection
@push('scripts')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dist/js/jquery.session.js') }}"></script>
<script>
  $(function () {
    var is_port_admin = '{{ $is_port_admin }}';
    if(is_port_admin == 0){
      $("#port_id").select2({});
      $('#port_id').val($.session.get('last_selected_port_id')).change();
    }
    
    $('#port_id').change(function(){
      $.session.set("last_selected_port_id", $('#port_id').val());
    });
    var table_incoming = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
        },
        ajax: {
                'url': '{!! route("admin-trackings.incoming-data") !!}/'+$("#port_id").val(),
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
    var table_outgoing = $('.data-table-outgoing').DataTable({
        processing: true,
        serverSide: true,
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
            return nRow;
        },
        ajax: {
                'url': '{!! route("admin-trackings.outgoing-data") !!}/'+$("#port_id").val(),
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
    $('#view_port').on('click', function () {
      table_incoming.ajax.url('{!! route("admin-trackings.incoming-data") !!}/'+$("#port_id").val()).load();
      table_outgoing.ajax.url('{!! route("admin-trackings.outgoing-data") !!}/'+$("#port_id").val()).load();
    });
  });
</script>
@endpush