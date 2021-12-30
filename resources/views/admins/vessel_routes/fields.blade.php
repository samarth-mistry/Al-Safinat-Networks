<!--begin::Body-->
@push('styles')
<style>
    .cursor-pointer {
        cursor: pointer
    }

    .Today {
        color: rgb(83, 83, 83)
    }

    .btn-outline-primary {
        background-color: #fff !important;
        color: #4bb8a9 !important;
        border: 1.3px solid #4bb8a9;
        font-size: 12px;
        border-radius: 0.4em !important
    }

    .btn-outline-primary:hover {
        background-color: #4bb8a9 !important;
        color: #fff !important;
        border: 1.3px solid #4bb8a9
    }

    .btn-outline-primary:focus,
    .btn-outline-primary:active {
        outline: none !important;
        box-shadow: none !important;
        border-color: #42A5F5 !important
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px
    }

    #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 33.33%;
        float: left;
        position: relative;
        font-weight: 400;
        color: #455A64 !important
    }

    #progressbar #step1:before {
        content: "1";
        color: #fff;
        width: 29px;
        margin-left: 15px !important;
        padding-left: 11px !important
    }

    #progressbar #step2:before {
        content: "2";
        color: #fff;
        width: 29px
    }

    #progressbar #step3:before {
        content: "3";
        color: #fff;
        width: 29px;
        margin-right: 15px !important;
        padding-right: 11px !important
    }

    #progressbar li:before {
        line-height: 29px;
        display: block;
        font-size: 12px;
        background: #455A64;
        border-radius: 50%;
        margin: auto
    }

    #progressbar li:after {
        content: '';
        width: 121%;
        height: 2px;
        background: #455A64;
        position: absolute;
        left: 0%;
        right: 0%;
        top: 15px;
        z-index: -1
    }

    #progressbar li:nth-child(2):after {
        left: 50%
    }

    #progressbar li:nth-child(1):after {
        left: 25%;
        width: 121%
    }

    #progressbar li:nth-child(3):after {
        left: 25% !important;
        width: 50% !important
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #4bb8a9
    }

    .card {
        background-color: #fff;
        //box-shadow: 2px 4px 15px 0px rgb(0, 108, 170);
        z-index: 0
    }
    .border-line {
        border-right: 1px solid rgb(226, 206, 226)
    }

    .card-footer img {
        opacity: 0.3
    }

    .card-footer h5 {
        font-size: 1.1em;
        color: #8C9EFF;
        cursor: pointer
    }
</style>
@endpush
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
        <div class="col-md-3">
            <label>Vessel:</label>
            <input type="text" class="form-control" name="name" value="{{ $vessel->name }}" disabled="true"/>
        </div>
    </div>
    <hr class="solid">
    <div class="container-fluid my-5 justify-content-center">
        <div class="card">
            <div class="form-group row">
                <div class="col col-lg-10">
                    <ul id="progressbar">
                    @foreach($route_array as $port)
                        <li class="step0 active text-center" id="step2">{{ $port }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="solid">
    <!-- <div class="form-group row">
        <div class="col-md-1">
            <label class="">Current Flow :</label>
        </div>
        @foreach($route_array as $port)
            <div class="col-md-1">
                <label class="text-primary">{{ $port }}</label>
                <i class="fa fa-arrow-right"></i>
            </div>
        @endforeach
    </div> -->
    <hr class="solid">
    <div class="form-group row">
        <div class="col-lg-12" id="kt_repeater_1">
            <div class="form-group row">
                <div class="col-lg-1">
                    <label class="col-form-label text-dark">New Route :</label>
                </div>
            </div>
            <div data-repeater-list="ports">
                <div data-repeater-item="" class="align-items-center">
                    <div class="form-group row">
                        <div class="col-lg-3 text-right">
                            <i class="fa fa-arrow-down"></i>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <select name="port_id" class="form-control port-field" id="port">
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