@extends('clients.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Your Bookings
                    <a href="{{ route('client-booking.create') }}" class="btn btn-primary" style="float: right;">
                        <i class="bi bi-plus"></i> New Booking
                    </a>
                </h5>
                <br>
                <table class="table table-bordered table-responsive data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Source Email</th>
                            <th>Source Phone</th>
                            <th>Unit Size</th>
                            <th>Source Port</th>
                            <th>Arrival at Source port</th>
                            <th>Destination Port</th>
                            <th>Dimentions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
    </div><!-- /.card -->
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->
@endsection
@push('scripts')
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
                'url': '{!! route("client-booking.data") !!}',
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'owner_name', name: 'owner_name'},
            {data: 'source_email', name: 'source_email'},
            {data: 'source_phone', name: 'source_phone'},
            {data: 'unit_size', name: 'unit_size'},
            {data: 'source_port', name: 'source_port'},
            {data: 's_date_arrival', name: 's_date_arrival'},
            {data: 'destination_port', name: 'destination_port'},
            {data: 'dimentions', name: 'dimentions'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush