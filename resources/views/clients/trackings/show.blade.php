@extends('clients.layouts.app')
@push('styles')
<style>
.events li { 
  display: flex; 
  color: #999;
}

.events port { 
  position: relative;
  padding: 0 1.5em;  }

.events port::after { 
   content: "";
   position: absolute;
   z-index: 2;
   right: 0;
   top: 0;
   transform: translateX(50%);
   border-radius: 50%;
   background: #fff;
   border: 1px #ccc solid;
   width: .8em;
   height: .8em;
}


.events span {
  padding: 0 1.5em 1.5em 1.5em;
  position: relative;
}

.events span::before {
   content: "";
   position: absolute;
   z-index: 1;
   left: 0;
   height: 100%;
   border-left: 1px #ccc solid;
}

.events strong {
   display: block;
   font-weight: bolder;
}

.events { margin: 1em; width: 50%; }
.events, 
.events *::before, 
.events *::after { box-sizing: border-box; font-family: arial; }
</style>
@endpush
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header bg-secondary">
        <h5 class="card-title text-center text-white">Tracking Details for <label class="text-info">{{ $tracking_id }}</label></h5>
    </div>
    <div class="card-body">
        <div class="mb-15">
            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label text-right">Requestor's Full Name :</label>
                        <label class="col-lg-3 col-form-label"><b> {{ $booking->owner_name }}</b></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Container Type :</label>
                        <label class="col-lg-3 col-form-label"><b> {{ $booking->unit_size == 0 ? 'TEU' : 'FEU' }}</b></label>
                        <label class="col-lg-3 col-form-label text-right">Material Type :</label>
                        <label class="col-lg-3 col-form-label"><b> {{ $booking->material_type_id }}</b></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-right">Weight :</label>
                        <label class="col-lg-3 col-form-label"><b> {{ $booking->weight }}</b></label>
                        <label class="col-lg-3 col-form-label text-right">Dementions :</label>
                        <label class="col-lg-3 col-form-label"><b> {{ $booking->d_l }}x{{ $booking->d_w }}x{{ $booking->d_h }}</b></label>
                    </div>
                    <div class="form-group row">
                        <table class="table table-responsive table-border">
                            <thead class="bg-info"><tr>
                                <th></th>
                                <th>Source Details</th>
                                <th>Destination Details</th>
                            </tr></thead>
                            <tbody>
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $booking->sourceCountry->name }}</td>
                                    <td>{{ $booking->destinationCountry->name }}</td>
                                </tr>
                                <tr>
                                    <td>Port</td>
                                    <td>{{ $booking->sourcePort->name }}</td>
                                    <td>{{ $booking->destinationPort->name }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $booking->source_address }}</td>
                                    <td>{{ $booking->destination_address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $booking->source_email }}</td>
                                    <td>{{ $booking->source_email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $booking->source_phone }}</td>
                                    <td>{{ $booking->source_phone }}</td>
                                </tr>
                                <tr>
                                    <td>Arrival Date</td>
                                    <td>{{ $booking->s_date_of_arrival }}</td>
                                    <td>{{ $booking->d_date_of_arrival_approx ? $booking->d_date_of_arrival_approx : '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-md-6 text-center badge badge-success">Start</label>
                    <ul class="events">
                        @php $cnt = 1; @endphp
                        @foreach($route_array as $port)
                        <li>
                            <port>{{ $cnt++ }}</port> 
                            <span><strong>{{ $port }}</strong></span>
                        </li>
                        @endforeach
                    </ul>
                    <label class="col-md-6 text-center badge badge-dark">End</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection