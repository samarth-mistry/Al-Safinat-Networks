<div class="card-body">
    <h5 class="text-green">Booking requestor's information:</h5>
    <div class="mb-15">
        <div class="form-group row">
        <label class="col-lg-4 text-right">Are you the owner of the transaction? </label>
            <div class="custom-control custom-switch col-lg-5">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="checked">
                <label class="custom-control-label" for="customSwitch1">Yes/No</label>
            </div>
            <label class="col-lg-1 col-form-label text-right">Date <span class="text-danger">*</span></label>
            <div class="col-lg-2">
                <input type="text" id="current_date" class="form-control"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Requestor's Full Name <span class="text-danger">*</span></label>
            <div class="col-lg-6">
                @if(empty($student))
                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : auth()->user()->name }}"/>
                @else
                    <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>
                @endif
                <span class="form-text text-muted">As per the passport</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Proof ID<span class="text-danger">*</span></label>
            <div class="col-lg-5">
                @if(empty($student))
                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter Number"/>
                @else
                    <input type="text" class="form-control" name="phone_number" value="{{ $phone_number }}" placeholder="Enter Number"/>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Country <span class="text-danger">*</span></label>
            <div class="col-lg-5">
            @if(empty($student))
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
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Address</label>
            <div class="col-lg-6">
                @if(empty($student))
                    <textarea name="source_address" class="form-control">{{ old('address') }}</textarea>
                @else
                    <textarea name="source_address" class="form-control">{{ $student->admin_remarks }}</textarea>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Email ID<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($student))
                    <input type="email" class="form-control" name="email_id" value="{{ old('email_id') }}"/>
                @else
                    <input type="email" class="form-control" name="email_id" value="{{ $email_id }}"/>
                @endif
            </div>
            <label class="col-lg-1 col-form-label text-right">Contact No.<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($student))
                    <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number') }}"/>
                @else
                    <input type="number" class="form-control" name="phone_number" value="{{ $phone_number }}"/>
                @endif
            </div>
        </div>
    </div>
    <h5 class="text-green">Source's Details:</h5>
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Unit's Size <span class="text-danger">*</span></label>
            <div class="col-lg-5">
            @if(empty($student))
                <select name="unit_type" id="country_id" class="form-control">
                    <option value="0">TEU (Twenty-foot Equivalent Unit)</option>
                    <option value="1">FEU (Forty-foot Equivalent Unit)</option>
                </select>
            @else
                <select name="unit_type" id="country_id" class="form-control">
                    <option value="0">TEU (Twenty-foot Equivalent Unit)</option>
                    <option value="1">FEU (Forty-foot Equivalent Unit)</option>
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Source Port Country <span class="text-danger">*</span></label>
            <div class="col-lg-4">
            @if(empty($student))
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
            <label class="col-lg-1 col-form-label text-right">Source Port <span class="text-danger">*</span></label>
            <div class="col-lg-4">
            @if(empty($student))
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Date of arrival at port<span class="text-danger">*</span></label>
            <div class="col-lg-3">
                @if(empty($student))
                    <input type="text" class="form-control date-picker" name="s_port_arrival_date" value="{{ old('s_port_arrival_date') }}" autocomplete="off"/>
                @else
                    <input type="text" class="form-control date-picker" name="s_port_arrival_date" value="{{ $student->s_port_arrival_date }}" autocomplete="off"/>
                @endif
                <span class="form-text text-muted">[DD/MM/YYYY] eg. 05/12/2021</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Port Administrator<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($student))
                    <input type="text" class="form-control" value="{{ old('till_date') }}" disabled/>
                @else
                    <input type="text" class="form-control" value="{{ old('till_date') }}" disabled/>
                @endif
            </div>
        </div>
    </div>
    <h5 class="text-green">Material's Details:</h5>
    <div class="mb-15">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Type of Material<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($student))
                    <select name="annual_id" class="form-control" id="annual_id">
                        <option value="">-- Select Type --</option>
                        @foreach($years as $year)
                            <option value="{{ $year->id }}" {{ old('annual_id') == $year->id ? 'selected':'' }}>{{ $year->year }}</option>
                        @endforeach
                    </select>
                @else
                    <select name="annual_id" id="annual_id" class="form-control">
                        <option value="">Select Year</option>
                        @foreach($years as $year)
                            <option value="{{ $year->id }}" {{ $student->annual_id == $year->id ? 'selected':'' }}>{{ $year->year }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-2 col-form-label text-right">Weight <span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($student))
                    <input type="text" class="form-control" name="weight" value="{{ old('weight') }}"/>
                @else
                    <input type="text" class="form-control" name="weight" value="{{ old('weight') }}"/>
                @endif
                <span class="form-text text-muted">[in Kilograms] eg. 1002.45</span>
            </div>
            <label class="col-lg-1 col-form-label text-right">Dimentions <span class="text-danger">*</span></label>
            <div class="col-lg-1">
                @if(empty($student))
                    <input type="text" class="form-control" name="length" value="{{ old('length') }}"/>
                @else
                    <input type="text" class="form-control" name="length" value="{{ old('length') }}"/>
                @endif
                <span class="form-text text-muted">[in Meters]</span>
            </div>×
            <div class="col-lg-1">
                @if(empty($student))
                    <input type="text" class="form-control" name="width" value="{{ old('width') }}"/>
                @else
                    <input type="text" class="form-control" name="width" value="{{ old('width') }}"/>
                @endif
                <span class="form-text text-muted">[in Meters]</span>
            </div>×
            <div class="col-lg-1">
                @if(empty($student))
                    <input type="text" class="form-control" name="height" value="{{ old('height') }}"/>
                @else
                    <input type="text" class="form-control" name="height" value="{{ old('height') }}"/>
                @endif
                <span class="form-text text-muted">[in Meters]</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Sensitivity</label>
            <div class="custom-control custom-switch col-lg-5">
                <input type="checkbox" class="custom-control-input" id="sensitivity_switch">
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
            @if(empty($student))
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
            <label class="col-lg-2 col-form-label text-right">Destination Port <span class="text-danger">*</span></label>
            <div class="col-lg-4">
            @if(empty($student))
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Approx of arrival at destination port<span class="text-danger">*</span></label>
            <div class="col-lg-3">
                @if(empty($student))
                    <input type="text" class="form-control date-picker" name="d_port_arrical_date" value="{{ old('d_port_arrical_date') }}" disabled/>
                @else
                    <input type="text" class="form-control date-picker" name="d_port_arrical_date" value="{{ $student->d_port_arrical_date }}" disabled/>
                @endif
                <span class="form-text text-muted">Note: This an approximate estimation</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Final Destination Details<span class="text-danger">*</span></label>
            <div class="col-lg-6">
                @if(empty($student))
                    <textarea name="destination_address" class="form-control">{{ old('destination_address') }}</textarea>
                @else
                    <textarea name="destination_address" class="form-control">{{ $student->admidestination_addressn_remarks }}</textarea>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label text-right">Port Administrator<span class="text-danger">*</span></label>
            <div class="col-lg-4">
                @if(empty($student))
                    <input type="text" class="form-control" value="{{ old('till_date') }}" disabled/>
                @else
                    <input type="text" class="form-control" value="{{ old('till_date') }}" disabled/>
                @endif
            </div>
        </div>
    </div>
</div>