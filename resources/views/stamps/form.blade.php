
<div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}" style="display:none">
    <label for="country_id" class="col-md-2 control-label">{{ trans('stamps.country_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="country_id" name="country_id">
        	    <option value="1" selected></option>
        </select>
        
        {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}" style="display:none">
    <label for="type" class="col-md-2 control-label">{{ trans('stamps.type') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="type" required="true">
        	    <option value="super admin" selected>
			    
			    </option>

        </select>
        
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">{{ trans('stamps.image') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="image" id="image" class="hidden">
                </span>
            </label>
           
        </div>

        @if (isset($stamp->image) && !empty($stamp->image))
            <div class="input-group input-width-input">
                 <img src="{{ asset($stamp->image) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly>
               
            </div>
        @endif
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>


