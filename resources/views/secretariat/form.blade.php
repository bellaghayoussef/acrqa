
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

 <input type="date"  class="form-control col-md-4" name="date" type="text" value="{{ old('Subject', optional($secretariat)->date) }}"  id="code" >
   <select class="form-control col-md-3" name="in">
            <option value="IN">IN</option>
            <option value="OUT">OUT</option>
        </select>
        @php
        if($secretariat == null){
            $secretariat = \App\Models\Secretariat::all()->last();
           // dd($secretariat);
           $secretariat->code = $secretariat->code + 1;
        }

        @endphp
        <input type="number"  class="form-control col-md-4" name="code" type="text" value="{{ old('Subject', optional($secretariat)->code) }}"  id="code" >
      
           
    </div>
</div>

<div class="col-md-6"></div>
<div class="form-group col-md-6 {{ $errors->has('Subject') ? 'has-error' : '' }}">
    <label for="Subject" class="col-md-2 control-label">{{ trans('letters.Subject') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Subject" type="text" id="Subject" value="{{ old('Subject', optional($secretariat)->Subject) }}" minlength="1" maxlength="255" placeholder="{{ trans('letters.Subject__placeholder') }}">
        {!! $errors->first('Subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-12{{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-2 control-label">{{ trans('letters.message') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="message" type="text" id="message" value="" maxlength="1000" placeholder="{{ trans('letters.message__placeholder') }}">{{ old('message', optional($secretariat)->message) }}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>


 
@if(auth()->user()->hasRole('super admin'))


<div class="form-check col-md-12">

  <input class="form-check-input" type="checkbox" value="1"  name="Signature"  id="flexCheckDefault">

  <label class="form-check-label" for="flexCheckDefault">
  {{ trans('letters.Signature') }}
  </label>

</div>

 <img src="{{ asset(auth()->user()->Signature) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" id="image" readonly>

@php

$spam = App\Models\stamp::all()->last();


@endphp
<div class="form-check col-md-12">

  <input class="form-check-input" type="checkbox" value="1"  name="stamp"  id="flexCheckDefault">

  <label class="form-check-label" for="flexCheckDefault">
  {{ trans('stamp') }}
  </label>

</div>

 <img src="{{ asset($spam->image) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" id="image" readonly>
@endif


<br>
<br>
<br>
<br>
<br>
<br>



 <img src="{{ asset($stamps->footer) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly>
