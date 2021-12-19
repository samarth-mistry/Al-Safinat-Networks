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
            <input type="text" class="form-control" name="name" value="{{ $vessel->name }}" disabled="true"/>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12" id="kt_repeater_1">
            <div data-repeater-list="ports">
                <div data-repeater-item="" class="align-items-center">
                    <div class="form-group row">
                        <div class="col-lg-3 text-right">
                            <i class="fa fa-arrow-down"></i>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <select name="port" class="form-control port-field" id="port">
                                <option value="">--Select Port--</option>
                                @foreach($ports as $port)
                                <option value="{{ $port->id }}">{{ $port->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <a href="javascript:;" data-repeater-delete="group-a" class="btn btn-sm font-weight-bolder btn-danger">
                            <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6 text-right">
                    <a href="javascript:;" data-repeater-create="group-a" class="btn btn-sm font-weight-bolder btn-primary">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Port
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>            

<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-vessel-routes.index') }}" class="btn btn-secondary">Back</a>
</div>
@push('scripts')
<!-- <script src="{{ asset('dist/js/form_repeater/form-repeater.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_repeater_1').repeater({});
        // $('.port-field').select2({});
    });
</script>
@endpush