<!--begin::Body-->
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
    <div class="form-group row">
        <div class="col-md-6">
            <label>Vessel <span class="text-danger">*</span></label>
            @if(empty($tracking))
                <select name="vessel_id" id="vessel_id" class="form-control">
                    <option value="">--Select Vessel--</option>
                    @foreach($vessels as $vessel)
                        <option value="{{ $vessel->id }}" {{ old('vessel_id') == $vessel->id ? 'selected':'' }}>{{ $vessel->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="vessel_id" id="vessel_id" class="form-control">
                    <option value="">--Select Vessel--</option>
                    @foreach($vessels as $vessel)
                        <option value="{{ $vessel->id }}" {{ $tracking->vessel_id == $vessel->id ? 'selected':'' }}>{{ $vessel->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>Batch <span class="text-danger">*</span></label>
            @if(empty($tracking))
                <input class="form-control" type="text" name="batch_id" id="batch_id" value="" readonly="true"/>
            @else
                <input class="form-control" type="text" name="batch_id" id="batch_id" value="{{ $tracking->batch_id }}" readonly="true"/>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Current Country <span class="text-danger">*</span></label>
            @if(empty($tracking))
                <select name="curr_country_id" id="curr_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('curr_country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="curr_country_id" id="curr_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $curr_port->country->id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>Current Port <span class="text-danger">*</span></label>
            @if(empty($tracking))
                <select name="curr_port_id" id="curr_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    <!-- @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ old('curr_port_id') == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach -->
                </select>
            @else
                <select name="curr_port_id" id="curr_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ $tracking->curr_port_id == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Next Country </label>
            @if(empty($tracking))
                <input class="form-control" type="text" name="next_country_id" id="next_country_id" value="" readonly="true"/>
            @else
                <input class="form-control" type="text" name="next_country_id" id="next_country_id" value="{{ $tracking->next_country_id }}" readonly="true"/>
            @endif
        </div>
        <div class="col-md-6">
            <label>Next Port </label>
            @if(empty($tracking))
                <input class="form-control" type="text" name="next_port_id" id="next_port_id" value="" readonly="true"/>
            @else
                <input class="form-control" type="text" name="next_port_id" id="next_port_id" value="{{ $tracking->next_country_id }}" readonly="true"/>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Status <span class="text-danger">*</span></label>
            @if(empty($tracking))
                <select name="status" id="status" class="form-control">
                    <option value="ported">Ported</option>
                    <option value="deported">Deported</option>
                    <option value="waiting">Waiting</option>
                    <option value="delivered">Delivered</option>
                    <option value="travelling">Travelling</option>
                    <option value="OOS">Out of service</option>
                </select>
            @else
                <select name="status" id="status" class="form-control">
                    <option value="ported" {{ $tracking->status == 'ported' ? 'selected':'' }}>Ported</option>
                    <option value="deported" {{ $tracking->status == 'deported' ? 'selected':'' }}>Deported</option>
                    <option value="waiting" {{ $tracking->status == 'waiting' ? 'selected':'' }}>Waiting</option>
                    <option value="delivered" {{ $tracking->status == 'delivered' ? 'selected':'' }}>Delivered</option>
                    <option value="travelling" {{ $tracking->status == 'travelling' ? 'selected':'' }}>Travelling</option>
                    <option value="OOS" {{ $tracking->status == 'OOS' ? 'selected':'' }}>Out of service</option>
                </select>
            @endif
        </div>
    </div>
</div>            
<!--end::Body-->
<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-trackings.index') }}" class="btn btn-secondary">Back</a>
</div>
@push('scripts')
    <script>
    $(document).ready(function(){
        $("#curr_port_id, #curr_country_id, #vessel_id, #status").select2({});
        $('#vessel_id').change(function(){
            if($(this).val() != ""){
                $.ajax({
                    url: '{{ url("ajax/get-batch-by-vessel") }}/' + $(this).val(),
                    beforeSend: function(){$(".loading-image").show();},
                    complete: function(){$(".loading-image").hide();},
                    success: function(response){
                        $('#batch_id').val(response);
                    }
                });
            } else {
                $('#batch_id').val('');
            }
        });
        $('#curr_country_id').change(function(){
            if($(this).val() != ""){
                $.ajax({
                    url: '{{ url("ajax/get-port-by-country") }}/' + $(this).val(),
                    beforeSend: function(){$(".loading-image").show();},
                    complete: function(){$(".loading-image").hide();},
                    success: function(response){
                        $('#curr_port_id').html('');
                        $.each(response, function(key, value){
                            $('#curr_port_id').append('<option value="'+key+'">'+value+'</option>')
                        });
                        getNextCountyAndPort();
                    }
                });
            } else {
                $('#curr_port_id').html('');
            }
        });
        $('#curr_port_id').change(function(){getNextCountyAndPort();});
        function getNextCountyAndPort(){
            if($('#curr_port_id').val() != "" && $('#vessel_id').val() != ""){
                $.ajax({
                    url: '{{ url("ajax/get-next-port") }}/' + $('#vessel_id').val() + '/' + $('#curr_port_id').val(),
                    beforeSend: function(){$(".loading-image").show();},
                    complete: function(){$(".loading-image").hide();},
                    success: function(response){
                        $('#next_port_id').val(response.port);
                        $('#next_country_id').val(response.country);
                    }
                });
            } else {
                $('#next_port_id').val('');
                $('#next_country_id').val('');
            }
        }
    });
    </script>
@endpush