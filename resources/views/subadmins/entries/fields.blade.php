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
            <label>Current Country <span class="text-danger">*</span></label>
            @if(empty($city))
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
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>Next Country <span class="text-danger">*</span></label>
            @if(empty($city))
                <select name="next_country_id" id="next_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('next_country_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="next_country_id" id="next_country_id" class="form-control">
                    <option value="">--Select Country--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Current Port <span class="text-danger">*</span></label>
            @if(empty($city))
                <select name="curr_port_id" id="curr_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('curr_port_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="curr_port_id" id="curr_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->curr_port_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>Next Port <span class="text-danger">*</span></label>
            @if(empty($city))
                <select name="next_port_id" id="next_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('next_port_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="next_port_id" id="next_port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->next_port_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Vessel <span class="text-danger">*</span></label>
            @if(empty($city))
                <select name="vessel_id" id="vessel_id" class="form-control">
                    <option value="">--Select Vessel--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('vessel_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="vessel_id" id="vessel_id" class="form-control">
                    <option value="">--Select Vessel--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->vessel_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>Batch <span class="text-danger">*</span></label>
            @if(empty($city))
                <select name="batch_id" id="batch_id" class="form-control">
                    <option value="">--Select Batch--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('batch_id') == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="batch_id" id="batch_id" class="form-control">
                    <option value="">--Select Batch--</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $city->batch_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Status </label>
                @if(empty($city))
                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                    <input type="checkbox" name="status" value='1' checked="checked">
                    <span></span>&nbsp;&nbsp; Enable/Disable
                </label>
                @else
                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                    <input type="checkbox" name="status" value='1' @if($city->status == 1 ) checked @endif>
                    <span></span>&nbsp;&nbsp; Enable/Disable
                </label>
                @endif
            </div>
        </div>
    </div>
</div>            
<!--end::Body-->
<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-cities.index') }}" class="btn btn-secondary">Back</a>
</div>