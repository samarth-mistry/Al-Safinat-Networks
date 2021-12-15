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
            <label>Name (Batch number)<span class="text-danger">*</span></label>
            @if(empty($batch))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
            @else
                <input type="text" class="form-control" name="name" value="{{ $batch->name }}"/>
            @endif
        </div>
        <div class="col-md-6">
        <label>Vessel <span class="text-danger">*</span></label>
            @if(empty($batch))
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
                        <option value="{{ $vessel->id }}" {{ $batch->vessel_id == $vessel->id ? 'selected':'' }}>{{ $vessel->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>From Unit <span class="text-danger">*</span></label>
            @if(empty($batch))
                <select name="from_unit" id="from_unit" class="form-control">
                    <option value="">--Select Unit--</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('from_unit') == $unit->id ? 'selected':'' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="from_unit" id="from_unit" class="form-control">
                    <option value="">--Select Unit--</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ $batch->from_unit == $unit->id ? 'selected':'' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>To Unit <span class="text-danger">*</span></label>
            @if(empty($batch))
                <select name="to_unit" id="to_unit" class="form-control">
                    <option value="">--Select Unit--</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('to_unit') == $unit->id ? 'selected':'' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="to_unit" id="to_unit" class="form-control">
                    <option value="">--Select Unit--</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ $batch->to_unit == $unit->id ? 'selected':'' }}>{{ $unit->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Description </label>
            @if(empty($batch))
            <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
            @else
            <textarea name="description" class="form-control" placeholder="Enter description">{{ $batch->description }}</textarea>
            @endif
        </div>
        <div class="col-md-6">
            <label>Status <span class="text-danger">*</span></label>
            @if(empty($batch))
                <select name="status" id="status" class="form-control">
                    <option value="ideal">Ideal</option>
                    <option value="travelling">Travelling</option>
                    <option value="ported">Ported</option>
                    <option value="deported">Deported</option>
                    <option value="OOS">Out of service</option>
                </select>
            @else
                <select name="status" id="status" class="form-control">
                    <option value="ideal" {{ $batch->status == 'ideal' ? 'selected':'' }}>Ideal</option>
                    <option value="travelling" {{ $batch->status == 'travelling' ? 'selected':'' }}>Travelling</option>
                    <option value="ported" {{ $batch->status == 'ported' ? 'selected':'' }}>Ported</option>
                    <option value="deported" {{ $batch->status == 'deported' ? 'selected':'' }}>Deported</option>
                    <option value="OOS" {{ $batch->status == 'OOS' ? 'selected':'' }}>Out of service</option>
                </select>
            @endif
        </div>
    </div>
</div>            

<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-batches.index') }}" class="btn btn-secondary">Back</a>
</div>