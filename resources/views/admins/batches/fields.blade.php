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
            @if(empty($unit))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
            @else
                <input type="text" class="form-control" name="name" value="{{ $unit->name }}"/>
            @endif
        </div>
        <div class="col-md-6">
            <label>Type <span class="text-danger">*</span></label>
            @if(empty($unit))
                <select class="form-control" id="" name="unit_size">
                    <option value="0">TEU</option>
                    <option value="1">FEU</option>
                </select>
            @else
                <select class="form-control" id="" name="unit_size">
                    <option value="0" {{ $unit->unit_size == 0 ? 'selected':'' }}>TEU</option>
                    <option value="1" {{ $unit->unit_size == 1 ? 'selected':'' }}>FEU</option>
                </select>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Origin Port <span class="text-danger">*</span></label>
            @if(empty($unit))
                <select name="port_id" id="port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ old('port_id') == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @else
                <select name="port_id" id="port_id" class="form-control">
                    <option value="">--Select Port--</option>
                    @foreach($ports as $port)
                        <option value="{{ $port->id }}" {{ $unit->port_id == $port->id ? 'selected':'' }}>{{ $port->name }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="col-md-6">
            <label>Maximum Load <span class="text-danger">*</span></label>
            @if(empty($unit))
                <input type="number" class="form-control" name="max_load" value="{{ old('max_load') }}"/>
            @else
                <input type="number" class="form-control" name="max_load" value="{{ $unit->max_load }}"/>
            @endif
            <span class="form-text text-muted">in Metric tonnes (x 1000kg)</span>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Description </label>
            @if(empty($unit))
            <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
            @else
            <textarea name="description" class="form-control" placeholder="Enter description">{{ $unit->description }}</textarea>
            @endif
        </div>
        <div class="col-md-6">
            <label>Status <span class="text-danger">*</span></label>
            @if(empty($unit))
                <select name="status" id="status" class="form-control">
                    <option value="ideal">Ideal</option>
                    <option value="travelling">Travelling</option>
                    <option value="ported">Ported</option>
                    <option value="deported">Deported</option>
                    <option value="OOS">Out of service</option>
                </select>
            @else
                <select name="status" id="status" class="form-control">
                    <option value="ideal" {{ $unit->status == 'ideal' ? 'selected':'' }}>Ideal</option>
                    <option value="travelling" {{ $unit->status == 'travelling' ? 'selected':'' }}>Travelling</option>
                    <option value="ported" {{ $unit->status == 'ported' ? 'selected':'' }}>Ported</option>
                    <option value="deported" {{ $unit->status == 'deported' ? 'selected':'' }}>Deported</option>
                    <option value="OOS" {{ $unit->status == 'OOS' ? 'selected':'' }}>Out of service</option>
                </select>
            @endif
        </div>
    </div>
</div>            

<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-offices.index') }}" class="btn btn-secondary">Back</a>
</div>