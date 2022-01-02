<!--begin::Body-->
@push('styles')
<style>
.events li { 
  display: flex; 
  color: #999;
}

.events port { 
  position: relative;
  padding: 0 1.5em;  }

.events port::after { 
   content: "";
   position: absolute;
   z-index: 2;
   right: 0;
   top: 0;
   transform: translateX(50%);
   border-radius: 50%;
   background: #fff;
   border: 1px #ccc solid;
   width: .8em;
   height: .8em;
}


.events span {
  padding: 0 1.5em 1.5em 1.5em;
  position: relative;
}

.events span::before {
   content: "";
   position: absolute;
   z-index: 1;
   left: 0;
   height: 100%;
   border-left: 1px #ccc solid;
}

.events strong {
   display: block;
   font-weight: bolder;
}

.events { margin: 1em; width: 50%; }
.events, 
.events *::before, 
.events *::after { box-sizing: border-box; font-family: arial; }
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
    <div class="form-group row">
        <div class="col-lg-6">
            <label class="col-md-6 text-center badge badge-success">Start</label>
            <ul class="events">
                @php $cnt = 1; @endphp
                @foreach($route_array as $port)
                <li>
                    <port>{{ $cnt++ }}</port> 
                    <span><strong>{{ $port }}</strong></span>
                </li>
                @endforeach
            </ul>
            <label class="col-md-6 text-center badge badge-dark">End</label>
        </div>
        <div class="col-lg-6" id="kt_repeater_1">
            <label class="col-lg-6 col-form-label badge badge-primary">New Route :</label>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script>
    $(document).ready(function () {
        $('#kt_repeater_1').repeater({});
    });
</script>
@endpush