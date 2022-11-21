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
        <dl class="dl-horizontal">
            <dt>{{ trans('users.udd') }}</dt>
            <dd>{{ $user->udd }}</dd>
            <dt>{{ trans('users.first_name') }}</dt>
            <dd>{{ $user->first_name }}</dd>
            <dt>{{ trans('users.last_name') }}</dt>
            <dd>{{ $user->last_name }}</dd>
            <dt>{{ trans('users.email') }}</dt>
            <dd>{{ $user->email }}</dd>
            <dt>{{ trans('users.phone') }}</dt>
            <dd>{{ $user->phone }}</dd>
            <dt>{{ trans('users.country_id') }}</dt>
            <dd>{{ optional($user->country)->name }}</dd>

             <dt>{{ trans('signature') }}</dt>
            <dd>
             <img src="{{ asset($user->Signature) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly></dd>
      

        </dl>
   <form method="POST" action="{{ route('signature') }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
         
        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}" >


  <div class="col-md-6">
                                <label>Signature:</label>
                                <br/>
                                <div id="sig"></div>
                                <br/><br/>
                                <input id="clear" class="btn btn-danger btn-sm" value="Clear">
                                <textarea id="signature" name="signed" style="display: none"></textarea>
                            </div>
                            <br/>
</div>
 <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('users.update') }}">
                    </div>
                </div>
</form>

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