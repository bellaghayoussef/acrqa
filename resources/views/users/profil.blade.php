@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }
    </style>
       <style type="text/css">
    .mb-5, .mb-2, .my-5 {
    margin-bottom: 1rem!important;
    margin-left: 1rem!important;
}

.mt-5, .mt-2, .my-5 {
    margin-top: 1rem!important;
}
</style>

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left col-md-11">
            <h4 class="mt-2 mb-2">{{ isset($title) ? $title : 'Profil' }}</h4>
        </span>

       

    </div>

    <div class="panel-body">
         @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('signature', $user->id) }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal row">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            
<div class="form-group col-md-6 {{ $errors->has('udd') ? 'has-error' : '' }}">
    <label for="udd" class="col-md-6 control-label">{{ trans('users.udd') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="udd" type="text" id="udd" value="{{ old('udd', optional($user)->udd) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.udd__placeholder') }}">
        {!! $errors->first('udd', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-6 control-label">{{ trans('users.first_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($user)->first_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.first_name__placeholder') }}">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-6 control-label">{{ trans('users.last_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($user)->last_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.last_name__placeholder') }}">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-6 control-label">{{ trans('users.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-6 control-label">{{ trans('users.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($user)->phone) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group col-md-6 {{ $errors->has('country_id') ? 'has-error' : '' }}">
    <label for="country_id" class="col-md-6 control-label">{{ trans('users.country_id') }}</label>
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


<div class="form-group {{ $errors->has('organization') ? 'has-error' : '' }}">
    <label for="organization" class="col-md-2 control-label">{{ trans('users.organization') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="organization" type="text" id="organization" value="{{ old('organization', optional($user)->organization) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.organization__placeholder') }}">
        {!! $errors->first('organization', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('Region') ? 'has-error' : '' }}">
    <label for="Region" class="col-md-2 control-label">{{ trans('users.Region') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Region" type="text" id="Region" value="{{ old('Region', optional($user)->Region) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.Region__placeholder') }}">
        {!! $errors->first('Region', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('code_postal') ? 'has-error' : '' }}">
    <label for="code_postal" class="col-md-2 control-label">{{ trans('users.code_postal') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="code_postal" type="text" id="code_postal" value="{{ old('code_postal', optional($user)->code_postal) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.code_postal__placeholder') }}">
        {!! $errors->first('code_postal', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('street') ? 'has-error' : '' }}">
    <label for="street" class="col-md-2 control-label">{{ trans('users.street') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="street" type="text" id="street" value="{{ old('street', optional($user)->street) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.street__placeholder') }}">
        {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group col-6 {{ $errors->has('Profession') ? 'has-error' : '' }}">
    <label for="Profession" class="col-md-2 control-label">{{ trans('users.Profession') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Profession" type="text" id="Profession" value="{{ old('Profession', optional($user)->Profession) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.Profession__placeholder') }}">
        {!! $errors->first('Profession', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group col-6 {{ $errors->has('Image') ? 'has-error' : '' }}">
    <label for="Image" class="col-md-2 control-label">{{ trans('users.Image') }}</label>
    <div class="col-md-10">
       <!--  -->
       
        <img src="{{ asset($user->Image) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly>
        <input class="form-control" name="Image" type="file" id="Image" value="" minlength="1" maxlength="255"  placeholder="{{ trans('users.Image__placeholder') }}">
        {!! $errors->first('Image', '<p class="help-block">:message</p>') !!}
    </div>
</div>



    <input name="_method" type="hidden" value="PUT">
         
        <div class="form-group col-md-6 {{ $errors->has('Signature') ? 'has-error' : '' }}" >


  <div class="col-md-6">
                                <label>Signature:</label>
                                <img src="{{ asset($user->Signature) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly>
                                <br/>
                                <div id="sig"></div>
                                <br/><br/>
                                <input id="clear" class="btn btn-danger btn-sm" value="Clear">
                                <textarea id="signature" name="signed" style="display: none"></textarea>

                                <input type="file" name="signedimage" class="form-control">
                            </div>
                            <br/>
</div>
 <div class="col-md-6">
                               <!--  <label>Signature:</label>
                                <br/>
                                <div id="sig"></div>
                                <br/><br/>
                                <input id="clear" class="btn btn-danger btn-sm" value="Clear">
                                <textarea id="signature" name="signed" style="display: none"></textarea>
                            </div>
                            <br/> -->
</div>

                <div class="form-group col-md-6">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('users.update') }}">
                    </div>
                </div>
            </form>
<!--    <form method="POST" action="{{ route('signature') }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
        
 <div class="form-group col-md-6">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('users.update') }}">
                    </div>
                </div>
</form> -->

    </div>
</div>

 <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
        $('#clear').click(function (e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>

@endsection