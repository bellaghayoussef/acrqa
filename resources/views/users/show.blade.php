@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left col-md-11">
            <h4 class="mt-2 mb-2">{{ isset($title) ? $title : 'User' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="{{ trans('users.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('users.user.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="{{ trans('users.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

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
      

        </dl>

    </div>
</div>

@endsection