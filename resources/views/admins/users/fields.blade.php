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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                @if(empty($user))
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name"/>
                @else
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter name"/>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email address <span class="text-danger">*</span></label>
                @if(empty($user))
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email"/>
                @else
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter email"/>
                @endif
            </div>
        </div>
    </div>
    @if(empty($user))
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" placeholder="Enter password"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password"/>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" placeholder="Enter password"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Confirm Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password"/>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Role <span class="text-danger">*</span></label>
                @if(empty($user))
                <select name="role_id" class="form-control">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected':'' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @else
                <select name="role_id" class="form-control">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles->first()->id == $role->id ? 'selected':'' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card-footer" style="background: khaki;">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <input type="reset" class="btn btn-warning mr-2" value="Reset"/>
	<a href="{{ route('admin-batches.index') }}" class="btn btn-secondary">Back</a>
</div>