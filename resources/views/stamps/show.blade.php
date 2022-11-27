@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Stamp' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('stamps.stamp.destroy', $stamp->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('stamps.stamp.index') }}" class="btn btn-primary" title="{{ trans('stamps.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

               
                    
                    <a href="{{ route('stamps.stamp.edit', $stamp->id ) }}" class="btn btn-primary" title="{{ trans('stamps.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('stamps.delete') }}" onclick="return confirm(&quot;{{ trans('stamps.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            
            <dt>{{ trans('stamps.image') }}</dt>
            <dd>
             <img src="{{ asset($stamp->image) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly></dd>


              <dt>{{ trans('stamps.header') }}</dt>
            <dd>
             <img src="{{ asset($stamp->header) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly></dd>



              <dt>{{ trans('stamps.footer') }}</dt>
            <dd>
             <img src="{{ asset($stamp->footer) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly></dd>

        </dl>

    </div>
</div>

@endsection