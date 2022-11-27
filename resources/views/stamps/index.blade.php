@extends('layouts.app')

@section('content')
<style type="text/css">
    .mb-5, .mb-2, .my-5 {
    margin-bottom: 1rem!important;
    margin-left: 1rem!important;
}

.mt-5, .mt-2, .my-5 {
    margin-top: 1rem!important;
}
</style>
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
                <h4 class="mt-5 mb-5">{{ trans('stamps.model_plural') }}</h4>
            </div>
 @if(count($stamps) == 0)
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('stamps.stamp.create') }}" class="btn btn-success" title="{{ trans('stamps.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>
            @endif

        </div>
        
        @if(count($stamps) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('stamps.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="" class="table mobile-accordion ">
                    <thead>
                        <tr>
                            <th>{{ trans('stamps.image') }}</th>
                          

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($stamps as $stamp)
                        <tr>
                            <td>    <img src="{{ asset($stamp->image) }}" style="    max-width: 300px;" type="text" class="form-control uploaded-file-name" readonly></td>
                           

                            <td>

                                <form method="POST" action="{!! route('stamps.stamp.destroy', $stamp->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('stamps.stamp.show', $stamp->id ) }}" class="btn btn-info" title="{{ trans('stamps.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('stamps.stamp.edit', $stamp->id ) }}" class="btn btn-primary" title="{{ trans('stamps.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('stamps.delete') }}" onclick="return confirm(&quot;{{ trans('stamps.confirm_delete') }}&quot;)">
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
            {!! $stamps->render() !!}
        </div>
        
        @endif
    
    </div>


      <script>
        $(document).ready(function() {
        //  $('#dataTables-example').dataTable();


          $('#dataTablesexample').dataTable({
       /** add this */
      
         /****** add this */
        "searching": true,

     "autoFill": false,
      "responsive": true,
        // "language": {
        //     "lengthMenu": "Por página: _MENU_",
        //     "zeroRecords": "Sin resultados",
        //     "info": "Mostrando página _PAGE_ de _PAGES_",
        //     "infoEmpty": "No hay registros disponibles",
        //     "infoFiltered": "(Filtrado de _MAX_ registros en total)"
 
        // }
    });
        });
    </script>
@endsection