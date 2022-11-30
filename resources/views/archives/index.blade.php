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

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('Archive') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('archives.archive.create') }}" class="btn btn-success" title="{{ trans('letters.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($Archives) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('letters.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table">

                <table id="dataTables-example" class="table table-striped  col-12">
                    <thead>
                        <tr>
                            <th>{{ trans('letters.code') }}</th>
                            
                            <th>{{ trans('date') }}</th>
                            <th>{{ trans('letters.Subject') }}</th>
                        

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($Archives as $archive)
                        <tr>
                            <td>{{ $archive->date }}-{{ $archive->in }}-{{ $archive->code }}</td>
                            <td>{{ $archive->date }}</td>
                            <td>{{ $archive->Subject }}</td>
                           
                       


                            <td>

                                <form method="POST" action="{!! route('archives.archive.destroy', $archive->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('archives.archive.show', $archive->id ) }}" class="btn btn-info" title="{{ trans('archives.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        @if(auth()->user()->id == $archive->from || auth()->user()->hasRole('super admin'))
                                        <a href="{{ route('archives.archive.edit', $archive->id ) }}" class="btn btn-primary" title="{{ trans('letters.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>


                                        <button type="submit" class="btn btn-danger" title="{{ trans('letters.delete') }}" onclick="return confirm(&quot;{{ trans('letters.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                         @endif
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

     
        @endif
    
    </div>
@endsection