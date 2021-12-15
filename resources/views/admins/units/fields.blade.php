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
            @if(empty($office))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
            @else
                <input type="text" class="form-control" name="name" value="{{ $office->name }}"/>
            @endif
        </div>
        <div class="col-md-6">
            <label>Type <span class="text-danger">*</span></label>
            @if(empty($office))
                <select class="form-control" id="" name="unit_size">
                    <option value="0">TEU</option>
                    <option value="1">FEU</option>
                </select>
            @else
                <select class="form-control" id="" name="type_id">
                    <option value="0" {{ $office->type_id == 0 ? 'selected':'' }}>TEU</option>
                    <option value="1" {{ $office->type_id == 1 ? 'selected':'' }}>FEU</option>
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Country <span class="text-danger">*</span></label>
            @if(empty($office))
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
                        <option value="{{ $country->id }}" {{ $office->country_id == $country->id ? 'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>City <span class="text-danger">*</span></label>
            @if(empty($office))
                <select name="city_id" id="city_id" class="form-control">
                    <option value="">--Select City--</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected':'' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="city_id" id="city_id" class="form-control">
                    <option value="">--Select City--</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $office->city_id == $city->id ? 'selected':'' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Address <span class="text-danger">*</span></label>
            @if(empty($office))
            <textarea name="address" class="form-control" placeholder="Enter address">{{ old('address') }}</textarea>
            @else
            <textarea name="address" class="form-control" placeholder="Enter address">{{ $office->address }}</textarea>
            @endif
        </div>
        <div class="col-md-6">
            <label>Phone <span class="text-danger">*</span></label>
            @if(empty($office))
                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"/>
            @else
                <input type="number" class="form-control" name="phone" value="{{ $office->phone }}"/>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Import Email <span class="text-danger">*</span></label>
            @if(empty($office))
                <input type="text" class="form-control" name="email_import" value="{{ old('email_import') }}"/>
            @else
                <input type="text" class="form-control" name="email_import" value="{{ $office->email_import }}"/>
            @endif
        </div>
        <div class="col-md-6">
            <label>Export Email <span class="text-danger">*</span></label>
            @if(empty($office))
                <input type="text" class="form-control" name="email_export" value="{{ old('email_export') }}"/>
            @else
                <input type="text" class="form-control" name="email_export" value="{{ $office->email_export }}"/>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Status <span class="text-danger">*</span></label>
            @if(empty($office))
            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                <input type="checkbox" name="status" value='1' checked="checked">
                <span></span>&nbsp;&nbsp; Enable/Disable
            </label>
            @else
            <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                <input type="checkbox" name="status" value='1' @if($office->status == 1 ) checked @endif>
                <span></span>&nbsp;&nbsp; Enable/Disable
            </label>
            @endif
        </div>
        <div class="col-md-6">
            <label>Opening Hours <span class="text-danger">*</span></label>
            @if(empty($office))
                <input type="text" class="form-control" name="opening_time" value="{{ old('opening_time') }}"/>
            @else
                <input type="text" class="form-control" name="opening_time" value="{{ $office->opening_time }}"/>
            @endif
        </div>
    </div>
</div>            

<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-offices.index') }}" class="btn btn-secondary">Back</a>
</div>