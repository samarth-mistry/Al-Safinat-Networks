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
                            <th>Name</th>
                            <th>Abbrevation</th>
                            <th>Remarks</th>
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
                'url': '{!! route("admin-continents.data") !!}',
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'abbr', name: 'abbr'},
            {data: 'remarks', name: 'remarks'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush