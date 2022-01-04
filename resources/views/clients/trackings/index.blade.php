@extends('clients.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{ route('client-trackings.show') }}" method="post">
                    @csrf
                    <h5 class="card-title">Track Your Unit</h5>
                    <div class="mb-15">
                        <div class="form-group row">
                            <div class="col-lg-5">
                                <input type="text" name="tracking_id" class="form-control" placeholder="Enter tracking id">
                                <span class="text-muted">Tracking ID can be found in the email sent by us after successful booking</span>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" class="btn btn-primary" value="Check"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
