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
            <div data-repeater-list="terms_lessons">
                <div data-repeater-item="" class="align-items-center">                                                                      
                    <div class="form-group row">
                        <div class="col-lg-8">
                            <select name="term" class="form-control" id="term"> 
                                <option value="">Select Port</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <a href="javascript:;" data-repeater-delete="group-a" class="btn btn-sm font-weight-bolder btn-light-danger">
                            <i class="la la-trash-o"></i>Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3 text-right">
                        <a href="javascript:;" data-repeater-create="group-a" class="btn btn-sm font-weight-bolder btn-light-primary">
                            <i class="la la-plus"></i>Add
                        </a>
                    </div>
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
<script>
    $(document).ready(function () {
        $('#kt_repeater_1').repeater({});
    });
</script>
@endpush