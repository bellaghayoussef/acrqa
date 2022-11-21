@extends('adminlte::page')
@section('css')



<style type="text/css">
    .switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;}
  
  .btn-group{
    display: block!important;
        align-self: center!important;
  }
  .panel-success>.panel-heading {
    background: teal;
    border-color: teal;
    color: white;
  }
  .panel-heading{
     border-left: 0.25rem solid #36b9cc!important;
    margin-left: 1px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;

    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
    margin-bottom: 26px;
    margin-top: 21px;
  }

  .panel-body{
    width: auto;
    border-top: 0.25rem solid #36b9cc!important;
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
    margin-left: 1px;
    padding: 36px;
}
.glyphicon-asterisk:before{content:"\2a";}
.glyphicon-plus:before{content:"\2b";}
.glyphicon-euro:before{content:"\20ac";}
.glyphicon-minus:before{content:"\2212";}
.glyphicon-cloud:before{content:"\2601";}
.glyphicon-envelope:before{content:"\2709";}
.glyphicon-pencil:before{content:"\270f";}
.glyphicon-glass:before{content:"\e001";}
.glyphicon-music:before{content:"\e002";}
.glyphicon-search:before{content:"\e003";}
.glyphicon-heart:before{content:"\e005";}
.glyphicon-star:before{content:"\e006";}
.glyphicon-star-empty:before{content:"\e007";}
.glyphicon-user:before{content:"\e008";}
.glyphicon-film:before{content:"\e009";}
.glyphicon-th-large:before{content:"\e010";}
.glyphicon-th:before{content:"\e011";}
.glyphicon-th-list:before{content:"\e012";}
.glyphicon-ok:before{content:"\e013";}
.glyphicon-remove:before{content:"\e014";}
.glyphicon-zoom-in:before{content:"\e015";}
.glyphicon-zoom-out:before{content:"\e016";}
.glyphicon-off:before{content:"\e017";}
.glyphicon-signal:before{content:"\e018";}
.glyphicon-cog:before{content:"\e019";}
.glyphicon-trash:before{content:"\e020";}
.glyphicon-home:before{content:"\e021";}
.glyphicon-file:before{content:"\e022";}
.glyphicon-time:before{content:"\e023";}
.glyphicon-road:before{content:"\e024";}
.glyphicon-download-alt:before{content:"\e025";}
.glyphicon-download:before{content:"\e026";}
.glyphicon-upload:before{content:"\e027";}
.glyphicon-inbox:before{content:"\e028";}
.glyphicon-play-circle:before{content:"\e029";}
.glyphicon-repeat:before{content:"\e030";}
.glyphicon-refresh:before{content:"\e031";}
.glyphicon-list-alt:before{content:"\e032";}
.glyphicon-flag:before{content:"\e034";}
.glyphicon-headphones:before{content:"\e035";}
.glyphicon-volume-off:before{content:"\e036";}
.glyphicon-volume-down:before{content:"\e037";}
.glyphicon-volume-up:before{content:"\e038";}
.glyphicon-qrcode:before{content:"\e039";}
.glyphicon-barcode:before{content:"\e040";}
.glyphicon-tag:before{content:"\e041";}
.glyphicon-tags:before{content:"\e042";}
.glyphicon-book:before{content:"\e043";}
.glyphicon-print:before{content:"\e045";}
.glyphicon-font:before{content:"\e047";}
.glyphicon-bold:before{content:"\e048";}
.glyphicon-italic:before{content:"\e049";}
.glyphicon-text-height:before{content:"\e050";}
.glyphicon-text-width:before{content:"\e051";}
.glyphicon-align-left:before{content:"\e052";}
.glyphicon-align-center:before{content:"\e053";}
.glyphicon-align-right:before{content:"\e054";}
.glyphicon-align-justify:before{content:"\e055";}
.glyphicon-list:before{content:"\e056";}
.glyphicon-indent-left:before{content:"\e057";}
.glyphicon-indent-right:before{content:"\e058";}
.glyphicon-facetime-video:before{content:"\e059";}
.glyphicon-picture:before{content:"\e060";}
.glyphicon-map-marker:before{content:"\e062";}
.glyphicon-adjust:before{content:"\e063";}
.glyphicon-tint:before{content:"\e064";}
.glyphicon-edit:before{content:"\e065";}
.glyphicon-share:before{content:"\e066";}
.glyphicon-check:before{content:"\e067";}
.glyphicon-move:before{content:"\e068";}
.glyphicon-step-backward:before{content:"\e069";}
.glyphicon-fast-backward:before{content:"\e070";}
.glyphicon-backward:before{content:"\e071";}
.glyphicon-play:before{content:"\e072";}
.glyphicon-pause:before{content:"\e073";}
.glyphicon-stop:before{content:"\e074";}
.glyphicon-forward:before{content:"\e075";}
.glyphicon-fast-forward:before{content:"\e076";}
.glyphicon-step-forward:before{content:"\e077";}
.glyphicon-eject:before{content:"\e078";}
.glyphicon-chevron-left:before{content:"\e079";}
.glyphicon-chevron-right:before{content:"\e080";}
.glyphicon-plus-sign:before{content:"\e081";}
.glyphicon-minus-sign:before{content:"\e082";}
.glyphicon-remove-sign:before{content:"\e083";}
.glyphicon-ok-sign:before{content:"\e084";}
.glyphicon-question-sign:before{content:"\e085";}
.glyphicon-info-sign:before{content:"\e086";}
.glyphicon-screenshot:before{content:"\e087";}
.glyphicon-remove-circle:before{content:"\e088";}
.glyphicon-ok-circle:before{content:"\e089";}
.glyphicon-ban-circle:before{content:"\e090";}
.glyphicon-arrow-left:before{content:"\e091";}
.glyphicon-arrow-right:before{content:"\e092";}
.glyphicon-arrow-up:before{content:"\e093";}
.glyphicon-arrow-down:before{content:"\e094";}
.glyphicon-share-alt:before{content:"\e095";}
.glyphicon-resize-full:before{content:"\e096";}
.glyphicon-resize-small:before{content:"\e097";}
.glyphicon-exclamation-sign:before{content:"\e101";}
.glyphicon-gift:before{content:"\e102";}
.glyphicon-leaf:before{content:"\e103";}
.glyphicon-eye-open:before{content:"\e105";}
.glyphicon-eye-close:before{content:"\e106";}
.glyphicon-warning-sign:before{content:"\e107";}
.glyphicon-plane:before{content:"\e108";}
.glyphicon-random:before{content:"\e110";}
.glyphicon-comment:before{content:"\e111";}
.glyphicon-magnet:before{content:"\e112";}
.glyphicon-chevron-up:before{content:"\e113";}
.glyphicon-chevron-down:before{content:"\e114";}
.glyphicon-retweet:before{content:"\e115";}
.glyphicon-shopping-cart:before{content:"\e116";}
.glyphicon-folder-close:before{content:"\e117";}
.glyphicon-folder-open:before{content:"\e118";}
.glyphicon-resize-vertical:before{content:"\e119";}
.glyphicon-resize-horizontal:before{content:"\e120";}
.glyphicon-hdd:before{content:"\e121";}
.glyphicon-bullhorn:before{content:"\e122";}
.glyphicon-certificate:before{content:"\e124";}
.glyphicon-thumbs-up:before{content:"\e125";}
.glyphicon-thumbs-down:before{content:"\e126";}
.glyphicon-hand-right:before{content:"\e127";}
.glyphicon-hand-left:before{content:"\e128";}
.glyphicon-hand-up:before{content:"\e129";}
.glyphicon-hand-down:before{content:"\e130";}
.glyphicon-circle-arrow-right:before{content:"\e131";}
.glyphicon-circle-arrow-left:before{content:"\e132";}
.glyphicon-circle-arrow-up:before{content:"\e133";}
.glyphicon-circle-arrow-down:before{content:"\e134";}
.glyphicon-globe:before{content:"\e135";}
.glyphicon-tasks:before{content:"\e137";}
.glyphicon-filter:before{content:"\e138";}
.glyphicon-fullscreen:before{content:"\e140";}
.glyphicon-dashboard:before{content:"\e141";}
.glyphicon-heart-empty:before{content:"\e143";}
.glyphicon-link:before{content:"\e144";}
.glyphicon-phone:before{content:"\e145";}
.glyphicon-usd:before{content:"\e148";}
.glyphicon-gbp:before{content:"\e149";}
.glyphicon-sort:before{content:"\e150";}
.glyphicon-sort-by-alphabet:before{content:"\e151";}
.glyphicon-sort-by-alphabet-alt:before{content:"\e152";}
.glyphicon-sort-by-order:before{content:"\e153";}
.glyphicon-sort-by-order-alt:before{content:"\e154";}
.glyphicon-sort-by-attributes:before{content:"\e155";}
.glyphicon-sort-by-attributes-alt:before{content:"\e156";}
.glyphicon-unchecked:before{content:"\e157";}
.glyphicon-expand:before{content:"\e158";}
.glyphicon-collapse-down:before{content:"\e159";}
.glyphicon-collapse-up:before{content:"\e160";}
.glyphicon-log-in:before{content:"\e161";}
.glyphicon-flash:before{content:"\e162";}
.glyphicon-log-out:before{content:"\e163";}
.glyphicon-new-window:before{content:"\e164";}
.glyphicon-record:before{content:"\e165";}
.glyphicon-save:before{content:"\e166";}
.glyphicon-open:before{content:"\e167";}
.glyphicon-saved:before{content:"\e168";}
.glyphicon-import:before{content:"\e169";}
.glyphicon-export:before{content:"\e170";}
.glyphicon-send:before{content:"\e171";}
.glyphicon-floppy-disk:before{content:"\e172";}
.glyphicon-floppy-saved:before{content:"\e173";}
.glyphicon-floppy-remove:before{content:"\e174";}
.glyphicon-floppy-save:before{content:"\e175";}
.glyphicon-floppy-open:before{content:"\e176";}
.glyphicon-credit-card:before{content:"\e177";}
.glyphicon-transfer:before{content:"\e178";}
.glyphicon-cutlery:before{content:"\e179";}
.glyphicon-header:before{content:"\e180";}
.glyphicon-compressed:before{content:"\e181";}
.glyphicon-earphone:before{content:"\e182";}
.glyphicon-phone-alt:before{content:"\e183";}
.glyphicon-tower:before{content:"\e184";}
.glyphicon-stats:before{content:"\e185";}
.glyphicon-sd-video:before{content:"\e186";}
.glyphicon-hd-video:before{content:"\e187";}
.glyphicon-subtitles:before{content:"\e188";}
.glyphicon-sound-stereo:before{content:"\e189";}
.glyphicon-sound-dolby:before{content:"\e190";}
.glyphicon-sound-5-1:before{content:"\e191";}
.glyphicon-sound-6-1:before{content:"\e192";}
.glyphicon-sound-7-1:before{content:"\e193";}
.glyphicon-copyright-mark:before{content:"\e194";}
.glyphicon-registration-mark:before{content:"\e195";}
.glyphicon-cloud-download:before{content:"\e197";}
.glyphicon-cloud-upload:before{content:"\e198";}
.glyphicon-tree-conifer:before{content:"\e199";}
.glyphicon-tree-deciduous:before{content:"\e200";}
.glyphicon-briefcase:before{content:"\1f4bc";}
.glyphicon-calendar:before{content:"\1f4c5";}
.glyphicon-pushpin:before{content:"\1f4cc";}
.glyphicon-paperclip:before{content:"\1f4ce";}
.glyphicon-camera:before{content:"\1f4f7";}
.glyphicon-lock:before{content:"\1f512";}
.glyphicon-bell:before{content:"\1f514";}
.glyphicon-bookmark:before{content:"\1f516";}
.glyphicon-fire:before{content:"\1f525";}
.glyphicon-wrench:before{content:"\1f527";}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {


  color: #ffffff!important;
    background-color: #C7C5F4!important;
     border-radius: 30px!important;
    -webkit-box-sizing: border-box!important;
  
    font-weight: 500!important;
}

.nav-link.active > i {
      width: 40px;
    height: 40px;
    line-height: 38px;
    font-size: 1.5714285714rem;
    display: inline-block;
    vertical-align: middle;
    color: #172b4c;
    text-align: center;
    border-radius: 100px;
    margin-right: 20px;

    color: #ffffff;
    background-color: #776BCC;
    -webkit-box-shadow: 0 4px 5px 0 rgb(76 149 221 / 50%);
    box-shadow: 0 4px 5px 0 rgb(76 149 221 / 50%);

}

.nav-link.active>.nav-link.active> a {
      width: 40px;
    height: 40px;
  
    font-size: 1.5714285714rem;
    display: inline-block;
    vertical-align: middle;
    color: #172b4c!important;
    text-align: center;

   
    background-color: transparentimportant;
    color: #ffffff;
    background-color: transparent!important;
    -webkit-box-shadow: 0 4px 5px 0 rgb(76 149 221 / 50%);
    box-shadow: 0 4px 5px 0 rgb(76 149 221 / 50%);

}
.form-group label {
    font-weight: 500!important;
}
.form-control {

  border-radius: 10px!important;
    box-shadow: none!important;
    border-color: #86a4c3!important;
    height: auto!important;
}
.panel-heading > .pull-left{
  flex: 0 0 91.666667%;
    max-width: 91.666667%;
}

</style>

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet"
      href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <style type="text/css">
    .mb-5, .mb-2, .my-5 {
    margin-bottom: 1rem!important;
    margin-left: 1rem!important;
}

.mt-5, .mt-2, .my-5 {
    margin-top: 1rem!important;
}
</style>
@stop

@section('js')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

     
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>

  
  
    <script>
        $(document).ready(function() {
        //  $('#dataTables-example').dataTable();


          $('#dataTables-example').dataTable({
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