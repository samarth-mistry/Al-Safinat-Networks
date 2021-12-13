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
            <label>Name <span class="text-danger">*</span></label>
            @if(empty($city))
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter title"/>
            @else
            <input type="text" class="form-control" name="name" value="{{ $city->name }}" placeholder="Enter title"/>
            @endif
        </div>
        <div class="col-md-6">
            <label>Type <span class="text-danger">*</span></label>
            @if(empty($city))
                <select class="from-control" id="" name="type_id">
                    <option value="0">TEU</option>
                    <option value="1">FEU</option>
                </select>
            @else
                <select class="from-control" id="" name="type_id">
                    <option value="0" {{ $city->type_id == 0 ? 'selected':'' }}>TEU</option>
                    <option value="1" {{ $city->type_id == 1 ? 'selected':'' }}>FEU</option>
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Country <span class="text-danger">*</span></label>
            @if(empty($city))
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
        <div class="col-md-6">
            <label>City <span class="text-danger">*</span></label>
            @if(empty($city))
                <select name="city_id" id="city_id" class="form-control">
                    <option value="">--Select City--</option>
                    @foreach($cities as $cityt)
                        <option value="{{ $cityt->id }}" {{ old('city_id') == $cityt->id ? 'selected':'' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="city_id" id="city_id" class="form-control">
                    <option value="">--Select City--</option>
                    @foreach($cities as $city)
                        <option value="{{ $cityt->id }}" {{ $cityt->city_id == $city->id ? 'selected':'' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Remarks </label>
            @if(empty($city))
            <textarea name="remarks" class="form-control" placeholder="Enter remarks">{{ old('remarks') }}</textarea>
            @else
            <textarea name="remarks" class="form-control" placeholder="Enter remarks">{{ $city->remarks }}</textarea>
            @endif
        </div>
    </div>
    <div class="form-group row">
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