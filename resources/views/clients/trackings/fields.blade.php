<div class="card-body">
    <h5 class="text-green">Booking requestor's information:</h5>
    <div class="mb-15">
        <div class="form-group row">
        <label class="col-lg-4 text-right">Are you the owner of the transaction? </label>
            <div class="custom-control custom-switch col-lg-5">
                @if(empty($booking))
                    <input type="checkbox" name="is_own" class="custom-control-input" id="switch_1" checked="checked">
                @else
                    <input type="checkbox" name="is_own" class="custom-control-input" id="switch_1" {{ $booking->sensitivity == 1 ? 'checked' : ''}}>
                @endif
                <label class="custom-control-label" for="switch_1">Yes/No</label>
            </div>
            <label class="col-lg-1 col-form-label text-right">Date <span class="text-danger">*</span></label>
            <div class="col-lg-2">
                <input type="text" id="current_date" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Requestor's Full Name <span class="text-danger">*</span></label>
            <div class="col-lg-6">
                @if(empty($booking))
                    <input type="text" class="form-control" name="owner_name" value="{{ old('owner_name') ? old('owner_name') : auth()->user()->name }}"/>
                @else
                    <input type="text" class="form-control" name="owner_name" value="{{ $booking->owner_name }}"/>
                @endif
                <span class="form-text text-muted">As per the passport</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Proof ID<span class="text-danger">*</span></label>
            <div class="col-lg-5">
                @if(empty($booking))
                    <input type="text" class="form-control" name="proof_id" value="{{ old('proof_id') }}"/>
                @else
                    <input type="text" class="form-control" name="proof_id" value="{{ $booking->proof_id }}"/>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Country <span class="text-danger">*</span></label>
            <div class="col-lg-5">
            @if(empty($booking))
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $booking->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Address</label>
            <div class="col-lg-6">
                @if(empty($booking))
                    <textarea name="source_address" class="form-control">{{ old('source_address') }}</textarea>
                @else
                    <textarea name="source_address" class="form-control">{{ $booking->source_address }}</textarea>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Email ID<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($booking))
                    <input type="email" class="form-control" name="source_email" value="{{ old('source_email') }}"/>
                @else
                    <input type="email" class="form-control" name="source_email" value="{{ $booking->source_email }}"/>
                @endif
            </div>
            <label class="col-lg-1 col-form-label text-right">Contact No.<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($booking))
                    <input type="number" class="form-control" name="source_phone" value="{{ old('source_phone') }}"/>
                @else
                    <input type="number" class="form-control" name="source_phone" value="{{ $booking->source_phone }}"/>
                @endif
            </div>
        </div>
    </div>
    <h5 class="text-green">Source's Details:</h5>
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Unit's Size <span class="text-danger">*</span></label>
            <div class="col-lg-5">
            @if(empty($booking))
                <select name="unit_size" id="country_id" class="form-control">
                    <option value="0">TEU (Twenty-foot Equivalent Unit)</option>
                    <option value="1">FEU (Forty-foot Equivalent Unit)</option>
                </select>
            @else
                <select name="unit_size" id="country_id" class="form-control">
                    <option value="0">TEU (Twenty-foot Equivalent Unit)</option>
                    <option value="1">FEU (Forty-foot Equivalent Unit)</option>
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Source Port Country <span class="text-danger">*</span></label>
            <div class="col-lg-4">
            @if(empty($booking))
                <select name="source_country_id" id="source_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('source_country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="source_country_id" id="source_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $booking->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
            <label class="col-lg-1 col-form-label text-right">Source Port <span class="text-danger">*</span></label>
            <div class="col-lg-4">
            @if(empty($booking))
                <select name="source_port_id" id="source_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ old('source_port_id') == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="source_port_id" id="source_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $country)
                        <option value="{{ $port->id }}" {{ $booking->source_port_id == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Date of arrival at port<span class="text-danger">*</span></label>
            <div class="col-lg-3">
                @if(empty($booking))
                    <input type="text" class="form-control date-picker" name="s_date_of_arrival" value="{{ old('s_date_of_arrival') }}" autocomplete="off"/>
                @else
                    <input type="text" class="form-control date-picker" name="s_date_of_arrival" value="{{ $booking->s_date_of_arrival }}" autocomplete="off"/>
                @endif
                <span class="form-text text-muted">[DD/MM/YYYY] eg. 05/12/2021</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Port Administrator<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($booking))
                    <input type="text" class="form-control" id="source_port_admin" value="" disabled/>
                @else
                    <input type="text" class="form-control" id="source_port_admin" value="" disabled/>
                @endif
            </div>
        </div>
    </div>
    <h5 class="text-green">Material's Details:</h5>
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Type of Material<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($booking))
                    <select name="material_type_id" class="form-control" id="material_type_id">
                        <option value="">-- Select Type --</option>
                        <option value="1">Wooden</option>
                        <option value="2">Glass & Silica (brittle)</option>
                        <option value="3">Rubber (flexible)</option>
                        <option value="4">Heavy Metal</option>
                        <option value="5">Electronic Item (sensitive)</option>
                        <option value="6">Food & Beverages (needs refrigeration)</option>
                        <option value="7">Other</option>
                    </select>
                @else
                    <select name="material_type_id" id="material_type_id" class="form-control">
                        <option value="">-- Select Type --</option>
                        <option value="1" {{ $booking->material_type_id == 1 ? 'selected':'' }}>Wooden</option>
                        <option value="2" {{ $booking->material_type_id == 2 ? 'selected':'' }}>Glass & Silica (brittle)</option>
                        <option value="3" {{ $booking->material_type_id == 3 ? 'selected':'' }}>Rubber (flexible)</option>
                        <option value="4" {{ $booking->material_type_id == 4 ? 'selected':'' }}>Heavy Metal</option>
                        <option value="5" {{ $booking->material_type_id == 5 ? 'selected':'' }}>Electronic Item (sensitive)</option>
                        <option value="6" {{ $booking->material_type_id == 6 ? 'selected':'' }}>Food & Beverages (needs refrigeration)</option>
                        <option value="7" {{ $booking->material_type_id == 7 ? 'selected':'' }}>Other</option>
                    </select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Weight <span class="text-danger">*</span></label>
            <div class="col-lg-3">
                @if(empty($booking))
                    <input type="number" class="form-control" name="weight" value="{{ old('weight') }}"/>
                @else
                    <input type="number" class="form-control" name="weight" value="{{ $booking->weight }}"/>
                @endif
                <span class="form-text text-muted">[in Kilograms] eg. 1002.45</span>
            </div>
            <label class="col-lg-2 col-form-label text-right">Dimentions <span class="text-danger">*</span></label>
            <div class="col-lg-1">
                @if(empty($booking))
                    <input type="number" class="form-control" name="length" value="{{ old('length') }}"/>
                @else
                    <input type="number" class="form-control" name="length" value="{{ $booking->d_l }}"/>
                @endif
                <span class="form-text text-muted">[in Meters]</span>
            </div>×
            <div class="col-lg-1">
                @if(empty($booking))
                    <input type="number" class="form-control" name="width" value="{{ old('width') }}"/>
                @else
                    <input type="number" class="form-control" name="width" value="{{ $booking->d_w }}"/>
                @endif
                <span class="form-text text-muted">[in Meters]</span>
            </div>×
            <div class="col-lg-1">
                @if(empty($booking))
                    <input type="number" class="form-control" name="height" value="{{ old('height') }}"/>
                @else
                    <input type="number" class="form-control" name="height" value="{{ $booking->d_h }}"/>
                @endif
                <span class="form-text text-muted">[in Meters]</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Sensitivity</label>
            <div class="custom-control custom-switch col-lg-5">
                @if(empty($booking))
                <input type="checkbox" class="custom-control-input" id="sensitivity_switch" name="sensitivity">
                @else
                <input type="checkbox" class="custom-control-input" id="sensitivity_switch" name="sensitivity" {{ $booking->sensitivity == 1 ? 'checked' : ''}}>
                @endif
                <label class="custom-control-label" for="sensitivity_switch">It is your container</label>
                <span class="form-text text-muted">Note : Sensitive material can increase the cost</span>
            </div>
        </div>
    </div>
    <h5 class="text-green">Destination's Details:</h5>
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Destination Port Country <span class="text-danger">*</span></label>
            <div class="col-lg-3">
            @if(empty($booking))
                <select name="destination_country_id" id="destination_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('destination_country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="destination_country_id" id="destination_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $booking->destination_country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
            <label class="col-lg-2 col-form-label text-right">Destination Port <span class="text-danger">*</span></label>
            <div class="col-lg-4">
            @if(empty($booking))
                <select name="destination_port_id" id="destination_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ old('destination_port_id') == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="destination_port_id" id="destination_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ $booking->destination_port_id == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Approx of arrival at destination port<span class="text-danger">*</span></label>
            <div class="col-lg-3">
                @if(empty($booking))
                    <input type="text" class="form-control date-picker" name="d_date_of_arrival_approx" value="{{ old('d_date_of_arrival_approx') }}" disabled/>
                @else
                    <input type="text" class="form-control date-picker" name="d_date_of_arrival_approx" value="{{ $booking->d_date_of_arrival_approx }}" disabled/>
                @endif
                <span class="form-text text-muted">Note: This an approximate estimation</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Final Destination Details<span class="text-danger">*</span></label>
            <div class="col-lg-6">
                @if(empty($booking))
                    <textarea name="destination_address" class="form-control">{{ old('destination_address') }}</textarea>
                @else
                    <textarea name="destination_address" class="form-control">{{ $booking->destination_address }}</textarea>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Port Administrator<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($booking))
                    <input type="text" class="form-control" id="destination_port_admin" value="" disabled/>
                @else
                    <input type="text" class="form-control" id="destination_port_admin" value="" disabled/>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2"value="Reset"/>
	<a href="{{ route('client-booking.index') }}" class="btn btn-secondary">Back</a>
</div>