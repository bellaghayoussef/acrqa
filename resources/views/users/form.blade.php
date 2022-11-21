
<div class="form-group {{ $errors->has('udd') ? 'has-error' : '' }}">
    <label for="udd" class="col-md-2 control-label">{{ trans('users.udd') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="udd" type="text" id="udd" value="{{ old('udd', optional($user)->udd) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.udd__placeholder') }}">
        {!! $errors->first('udd', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">{{ trans('users.first_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($user)->first_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.first_name__placeholder') }}">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">{{ trans('users.last_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($user)->last_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.last_name__placeholder') }}">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('users.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('users.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($user)->phone) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
    <label for="country_id" class="col-md-2 control-label">{{ trans('users.country_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="country_id" name="country_id" required="true">
        	    <option value="" style="display: none;" {{ old('country_id', optional($user)->country_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('users.country_id__placeholder') }}</option>
        	@foreach ($countries as $key => $country)
			    <option value="{{ $key }}" {{ old('country_id', optional($user)->country_id) == $key ? 'selected' : '' }}>
			    	{{ $country }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label for="role_id" class="col-md-2 control-label">Role</label>
    <div class="col-md-10">
        <select class="form-control" id="role_id" name="role_id" required="true">
             <!--    <option value="" style="display: none;" {{ old('role_id', optional($user)->role_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('users.role_id__placeholder') }}</option> -->

          
                <option value="super admin" >super admin</option>
                <option value="admin" >admin</option>
                <option value="user"  >user</option>
       
                   
                
        </select>
        
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>




