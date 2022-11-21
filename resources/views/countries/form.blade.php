
<div class="form-group {{ $errors->has('iso') ? 'has-error' : '' }}" style="display: none;">
    <label for="iso" class="col-md-2 control-label">{{ trans('countries.iso') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="iso" type="text" id="iso" value="uu" minlength="1" maxlength="2" required="true" placeholder="{{ trans('countries.iso__placeholder') }}">
        {!! $errors->first('iso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('countries.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($countries)->name) }}" minlength="1" maxlength="80" required="true" placeholder="{{ trans('countries.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nicename') ? 'has-error' : '' }}">
    <label for="nicename" class="col-md-2 control-label">{{ trans('countries.nicename') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="nicename" type="text" id="nicename" value="{{ old('nicename', optional($countries)->nicename) }}" minlength="1" maxlength="80" required="true" placeholder="{{ trans('countries.nicename__placeholder') }}">
        {!! $errors->first('nicename', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('iso3') ? 'has-error' : '' }}"style="display: none;">>
    <label for="iso3" class="col-md-2 control-label">{{ trans('countries.iso3') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="iso3" type="text" id="iso3" value="uu" maxlength="3" placeholder="{{ trans('countries.iso3__placeholder') }}">
        {!! $errors->first('iso3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numcode') ? 'has-error' : '' }}"style="display: none;">>
    <label for="numcode" class="col-md-2 control-label">{{ trans('countries.numcode') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="numcode" type="text" id="numcode" value="name" min="-32768" max="32767" placeholder="{{ trans('countries.numcode__placeholder') }}">
        {!! $errors->first('numcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phonecode') ? 'has-error' : '' }}">
    <label for="phonecode" class="col-md-2 control-label">{{ trans('countries.phonecode') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phonecode" type="number" id="phonecode" value="{{ old('phonecode', optional($countries)->phonecode) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('countries.phonecode__placeholder') }}">
        {!! $errors->first('phonecode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stat') ? 'has-error' : '' }}">
    <label for="stat" class="col-md-2 control-label">{{ trans('countries.stat') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="stat_1">
            	<input id="stat_1" class="" name="stat" type="checkbox" value="1" {{ old('stat', optional($countries)->stat) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('stat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

