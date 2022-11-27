@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
   <div class="panel-heading clearfix">
            
            <span class="pull-left col-md-11">
                <h4 class="mt-2 mb-2">{{ trans('users.edit') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-righ t" role="group">
                <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="{{ trans('users.show_all') }}">
                    <span class="fa fa-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('users.user.update', $user->id) }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal row" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('users.form', [
                                        'user' => $user,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('users.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>


@endsection