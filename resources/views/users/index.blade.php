@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left col-md-11">
                <h4 class="mt-2 mb-2">{{ trans('users.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($users) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('users.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('users.udd') }}</th>
                            <th>{{ trans('users.first_name') }}</th>
                            <th>{{ trans('users.last_name') }}</th>
                            <th>{{ trans('users.email') }}</th>
                            <th>{{ trans('users.phone') }}</th>
                            <th>{{ trans('users.country_id') }}</th>
                             <th>Role</th>
                       

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->udd }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ optional($user->country)->name }}</td>
                            <td>@foreach( $user->getRoleNames() as $role)
                                {{$role}}
                                @endforeach
                               </td>
                          

                            <td>

                                <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('users.user.show', $user->id ) }}" class="btn btn-info" title="{{ trans('users.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="{{ trans('users.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $users->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection