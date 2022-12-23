
@php
$stamps = App\Models\stamp::first();

$users = App\Models\User::all();

@endphp

 <img src="{{ asset($stamps->header) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly>
<br>
<br>
<br>
<br>
<br>
<br>

<br>



<div class="form-group col-md-6 {{ $errors->has('to') ? 'has-error' : '' }}">
    <label for="to" class="col-md-2 control-label">{{ trans('letters.code') }}</label>
    <div class="col-md-10 row">

 <input type="date"  class="form-control col-md-4" name="date" type="text" value="{{ old('Subject', optional($archive)->date) }}"  id="code" >
   <select class="form-control col-md-3" name="in">
            <option value="IN">IN</option>
            <option value="OUT">OUT</option>
        </select>
        <input type="text"  class="form-control col-md-4" name="code" type="text" value="{{ old('Subject', optional($archive)->code) }}"  id="code" >
      
           
    </div>
</div>

<div class="col-md-6"></div>
<div class="form-group col-md-6 {{ $errors->has('Subject') ? 'has-error' : '' }}">
    <label for="Subject" class="col-md-4 control-label">{{ trans('letters.Subject') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Subject" type="text" id="Subject" value="{{ old('Subject', optional($archive)->Subject) }}" minlength="1" maxlength="255" placeholder="{{ trans('letters.Subject__placeholder') }}">
        {!! $errors->first('Subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group  col-md-12{{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-4 control-label">{{ trans('letters.message') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="message" type="text" id="message" value="" maxlength="1000" placeholder="{{ trans('letters.message__placeholder') }}">{{ old('message', optional($archive)->message) }}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>


 



<br>
<br>
<br>
<br>
<br>
<br>



 <img src="{{ asset($stamps->footer) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly>
