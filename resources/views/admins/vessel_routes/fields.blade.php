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
            @if(empty($vessel))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
            @else
                <input type="text" class="form-control" name="name" value="{{ $vessel->name }}"/>
            @endif
        </div>
        <div class="col-md-6">
            <label>Maximum Units <span class="text-danger">*</span></label>
            @if(empty($vessel))
                <input type="number" class="form-control" name="max_units" value="{{ old('max_units') }}"/>
            @else
                <input type="number" class="form-control" name="max_units" value="{{ $vessel->max_units }}"/>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Description </label>
            @if(empty($vessel))
            <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
            @else
            <textarea name="description" class="form-control" placeholder="Enter description">{{ $vessel->description }}</textarea>
            @endif
        </div>
        <div class="col-md-6">
            <label>Status <span class="text-danger">*</span></label>
            @if(empty($vessel))
                <select name="status" id="status" class="form-control">
                    <option value="ideal">Ideal</option>
                    <option value="travelling">Travelling</option>
                    <option value="ported">Ported</option>
                    <option value="deported">Deported</option>
                    <option value="OOS">Out of service</option>
                </select>
            @else
                <select name="status" id="status" class="form-control">
                    <option value="ideal" {{ $vessel->status == 'ideal' ? 'selected':'' }}>Ideal</option>
                    <option value="travelling" {{ $vessel->status == 'travelling' ? 'selected':'' }}>Travelling</option>
                    <option value="ported" {{ $vessel->status == 'ported' ? 'selected':'' }}>Ported</option>
                    <option value="deported" {{ $vessel->status == 'deported' ? 'selected':'' }}>Deported</option>
                    <option value="OOS" {{ $vessel->status == 'OOS' ? 'selected':'' }}>Out of service</option>
                </select>
            @endif
        </div>
    </div>
</div>            

<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-vessels.index') }}" class="btn btn-secondary">Back</a>
</div>