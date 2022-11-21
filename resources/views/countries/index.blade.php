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

           
                <h4 class="mt-2 mb-2">{{ trans('countries.Countries') }}</h4>
           
           

        </div>
        
        @if(count($countriesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Countries Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="dataTablesxamplee" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                           
                      

                            <th>{{ trans('countries.name') }}</th>
                            <th>{{ trans('countries.nicename') }}</th>
                          
                            <th>{{ trans('countries.phonecode') }}</th>
                            <th>{{ trans('countries.admin') }}</th>
                           
                            <th>{{ trans('countries.stat') }}</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($countriesObjects as $countries)
                        <tr>
                           
                            <td>{{ $countries->name }}</td>
                             <td>{{ $countries->nicename }}</td>

                           
                            <td>{{ $countries->phonecode }}</td>
                            <td> @if($countries->user_id == null)
                          <button type="button" class="btn btn-info" style="border: 0;border-radius: 0.25em;background: initial;background-color: #5cb85c;color: #fff;font-size: 1em;" title="" onclick="add({{$countries->id}})" >
                                            <span class="fa fa-plus" aria-hidden="true"></span>
                                        </button>
                                 @else
                                 <button type="button" style="border: 0;border-radius: 0.25em;background: initial;background-color: #7066e0;color: #fff;font-size: 1em;" class="btn btn-info" title="" onclick="edit({{$countries->user}})">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>
                                 @endif
                              </td>

                           
                            <td>

 <label class="switch">

                           @if($countries->stat == 1)
        <input type="checkbox" id="stat" name="stat" onclick="fun({{$countries->id}})"  checked >
     <div class="slider round"><!--ADDED HTML -->
           <span class="on">{{trans('countries.active') }}</span>
          <span class="off">{{trans('countries.inactive') }}</span>
        @else
         <input type="checkbox" id="stat" name="stat"   onclick="fun({{$countries->id}})">
     <div class="slider round"><!--ADDED HTML -->
        <span class="off">{{trans('countries.inactive') }}</span>
         <span class="on">{{trans('countries.active') }}</span>
        @endif
        </div></label>
                        </td>    

                        
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

      
        @endif
    
    </div>











        <!-- Modal -->
<div id="myModal" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" onclick="closemodal()">&times;</button>
        <h4 class="modal-title">{{ trans('countries.admin') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        


<div class="form-group {{ $errors->has('udd') ? 'has-error' : '' }}">
    <label for="udd" class="col-md-2 control-label">{{ trans('users.udd') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="udd" type="text" id="udd"  minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.udd__placeholder') }}">
        {!! $errors->first('udd', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">{{ trans('users.first_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.first_name__placeholder') }}">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">{{ trans('users.last_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name"  minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.last_name__placeholder') }}">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('users.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email"minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('users.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<input type="hidden"  id="role_id" name="role_id"  value="admin">




<input type="hidden" name="country_id" id="countriesid" >

      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeb" onclick="closemodal()">Close</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="save()">{{ trans('user.save') }}</button>
      </div>
    </div>

  </div>
</div>



        <!-- Modal -->
<div id="myModal1" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" onclick="closemodal()">&times;</button>
        <h4 class="modal-title">{{ trans('countries.admin') }}</h4>
      </div>
      <div class="modal-body form-horizontal">
        

 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divemail" >
    <label for="date" class="col-md-2 control-label">{{ trans('user.email') }}</label>
    <div class="col-md-10">
        <input type="email" name="email1" id="email1" class="form-control" required>
          
    </div>
</div>




 <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}" id="divpassword">
    <label for="date" class="col-md-2 control-label">{{ trans('user.password') }}</label>
    <div class="col-md-10">
        <input type="password" name="password1" id="password1" class="form-control" required>
          
    </div>
</div>

<input type="hidden" name="userid" id="userid" >

      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeb" onclick="closemodal()">Close</button>
         <button type="button" class="btn btn-success"  id="Save" onclick="editadmin()">{{ trans('user.save') }}</button>
      </div>
    </div>

  </div>
</div>






@endsection

@section('js')

 <script type="text/javascript">
    $(document).ready(function() {



 


 });
function fun(id){
  $.get("{{ url('countries/countriesup')}}", 
        { id: id,
         
         }, 
        function(data) {
          
           if(data == "success"){
               window.setTimeout(function(){location.reload()},2000);
           }
        });

}


function add(id){

$('#myModal').show();

$('#countriesid').val(id)
}


function edit(user){

$('#myModal1').show();

$('#userid').val(user['id']);
$('#email1').val(user['email']);
$('#password1').val(user['password']);

}



function edituser(countrie){

$('#myModal2').show();

$('#countrieid').val(countrie['id']);
$('#produit_user').val(countrie['produit_user']);


}



function closemodal(){
    
  $('#myModal').hide();
   $('#myModal1').hide();
     $('#myModal2').hide();

  
 
}

function save(){
    $('#myModal').hide();



       $.get("{{ route('storeadmin')}}", 
        {
          
           udd:$('#udd').val(),
           first_name:$('#first_name').val(),
           last_name:$('#last_name').val(),
           email:$('#email').val(),
           phone:$('#phone').val(),
           country_id:$('#countriesid').val(),
           password:$('#password').val(),
           role_id:$('#role_id').val(),
           

         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
            Swal.fire(
  'أحسنت!',

  'نجاح'
)
               window.setTimeout(function(){location.reload()},2000);

           }else{
              console.log(data);
 Swal.fire({
  icon: 'error',
  title: 'عفوا ...',
  text: 'هناك خطأ ما!',
})
           }
        });

}



function editadmin(){
    $('#myModal1').hide();



       $.get("{{ url('editadmin')}}", 
        {
          
   
           email:$('#email1').val(),
           password:$('#password1').val(),
           id:$('#userid').val(),

         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
            Swal.fire(
  'أحسنت!',

  'نجاح'
)
               window.setTimeout(function(){location.reload()},2000);

           }else{
              console.log(data);
 Swal.fire({
  icon: 'error',
  title: 'عفوا ...',
  text: 'هناك خطأ ما!',
})
           }
        });

}


function saveedituser(){
    $('#myModal2').hide();



       $.get("{{ url('saveedituser')}}", 
        {
          
   
           id:$('#countrieid').val(),
           produit_user:$('#produit_user').val(),
         

         }, 
        function(data) {
           console.log(data);
           if(data == "success"){
            Swal.fire(
  'أحسنت!',

  'نجاح'
)
               window.setTimeout(function(){location.reload()},2000);

           }else{
              console.log(data);
 Swal.fire({
  icon: 'error',
  title: 'عفوا ...',
  text: 'هناك خطأ ما!',
})
           }
        });

}


 </script>

    <script>
        $(document).ready(function() {
        //  $('#dataTables-example').dataTable();


          $('#dataTablesxample').dataTable({
       /** add this */
       initComplete: function() {
        $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
    },
         /****** add this */
        "searching": true,

     "autocomplete": false,
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


