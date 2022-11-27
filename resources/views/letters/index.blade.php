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
                <h4 class="mt-5 mb-5">{{ trans('letters.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('letters.letter.create') }}" class="btn btn-success" title="{{ trans('letters.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($letters) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('letters.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTables-example" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('letters.code') }}</th>
                            <th>{{ trans('letters.from') }}</th>
                            <th>{{ trans('letters.to') }}</th>
                            <th>{{ trans('letters.Subject') }}</th>
                
                            <th>{{ trans('letters.approved') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($letters as $letter)
                        <tr>
                            <td>{{ $letter->code }}</td>
                            <td>{{ $letter->sender->first_name ." " . $letter->sender->last_name }}</td>
                            <td>{{$letter->recever->first_name ." " . $letter->recever->last_name }}</td>
                            <td>{{ $letter->Subject }}</td>
                       
                            <td>
                                @if($letter->approved == 0 || $letter->approved == null)
                              
                                <a href="{{ route('letters.letter.edit', $letter->id ) }}" type="button" name="" class="btn btn-warning" title="Pending">Pending</a>
                                @elseif($letter->approved == 1 || $letter->approved == "1")
                                <a href="{{ route('letters.letter.show', $letter->id ) }}" type="button" name="" class="btn btn-success" title="Approved">Approved</a>
                                @else
                                 <a href="{{ route('letters.letter.edit', $letter->id ) }}" type="button" name="" class="btn btn-danger" title="Refused">Refused</a>
                            @endif</td>

                            <td>

                                <form method="POST" action="{!! route('letters.letter.destroy', $letter->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('letters.letter.show', $letter->id ) }}" class="btn btn-info" title="{{ trans('letters.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('letters.letter.edit', $letter->id ) }}" class="btn btn-primary" title="{{ trans('letters.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('letters.delete') }}" onclick="return confirm(&quot;{{ trans('letters.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
            {!! $letters->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection