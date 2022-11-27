
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
<div class="form-group col-md-6 {{ $errors->has('to') ? 'has-error' : '' }}">
    <label for="to" class="col-md-2 control-label">{{ trans('letters.to') }}</label>
    <div class="col-md-10">

        <select class="form-control" name="to" type="text" id="to" >
            @foreach($users as $user)
<option value="{{ $user->id}}"> {{$user->first_name ."  ". $user->last_name }}</option>
            @endforeach
        </select>
    </div>
</div>
<br>
<div class="col-md-6"></div>
<div class="form-group col-md-6 {{ $errors->has('Subject') ? 'has-error' : '' }}">
    <label for="Subject" class="col-md-2 control-label">{{ trans('letters.Subject') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Subject" type="text" id="Subject" value="{{ old('Subject', optional($letter)->Subject) }}" minlength="1" maxlength="255" placeholder="{{ trans('letters.Subject__placeholder') }}">
        {!! $errors->first('Subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-12{{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-2 control-label">{{ trans('letters.message') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="message" type="text" id="message" value="" maxlength="1000" placeholder="{{ trans('letters.message__placeholder') }}">{{ old('message', optional($letter)->message) }}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>


 

<div class="form-check col-md-12">

  <input class="form-check-input" type="checkbox" value="" checked name="Signatured"  id="flexCheckDefault">

  <label class="form-check-label" for="flexCheckDefault">
  {{ trans('letters.Signature') }}
  </label>

</div>
<input type="hidden" name="Signature"  id="Signature" value="{ old('Signature', optional($letter)->Signature) }}">

 <img src="{{ asset(auth()->user()->Signature) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" id="image" readonly>

<br>


<br>
<br>
<br>
<br>
<br>
<br>



 <img src="{{ asset($stamps->footer) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly>
