@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    

    <div class="panel-body">

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
        <div class="mb-3" style="align-self: flex-end;">
            {{ $letter->code }}<br>
            {!! DNS1D::getBarcodeHTML($letter->code, "C128",1.4,16) !!}
        </div>

        <dl class="dl-horizontal">
          
            <dt>{{ trans('letters.from') }}</dt>
            <dd>{{ $letter->sender->first_name ." " . $letter->sender->last_name }}</dd>
            <dt>{{ trans('letters.to') }}</dt>
            <dd>{{  $letter->recever->first_name ." " . $letter->recever->last_name }}</dd>
            <br>
            <dd>{{ $letter->Subject }}</dd>
            <br>
          
           
          {!! $letter->message !!}
          @if($letter->Signature == '1')
          {{ $letter->sender->first_name ." " . $letter->sender->last_name }}
          <img src="{{ asset($letter->sender->Signature) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" id="image" readonly>
          @endif


        </dl>

<div class="col-md-12"  style="text-align: center;">
    <img src="{{ asset($stamps->image) }}" style="      max-width: 111px;
"  id="image" readonly>
 
</div>

<br>
<br>
<br>
<br>
<br>
<br>



 <img src="{{ asset($stamps->footer) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly>

    </div>
</div>

@endsection