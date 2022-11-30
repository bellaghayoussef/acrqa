<!DOCTYPE html>
<html dir="rtl" lang="ar">
  <head>
    <meta charset="utf-8">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style type="text/css">
    .mb-5, .mb-2, .my-5 {
    margin-bottom: 1rem!important;
    margin-left: 1rem!important;
}

.mt-5, .mt-2, .my-5 {
    margin-top: 1rem!important;
}
@media print {
  div.divFooter {
    position: fixed;
    bottom: 0;
        max-height: 111px;
    min-width: -webkit-fill-available;
  }
   div.divheader {
    position: fixed;
    top: 0;
        max-height: 111px;
    min-width: -webkit-fill-available;
  }
}
   @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                font-family: Arial;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 4cm;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 4cm;

                /** Extra personal styles **/
             
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
             * { font-family: DejaVu Sans, sans-serif; }


</style>
  </head>
  <body>


  	        @php
$stamps = App\Models\stamp::first();

$users = App\Models\User::all();

@endphp

      <header>
          <img src="{{ asset($stamps->header) }}" width="100%" height="100%" id="image" readonly>
        </header>

        <footer>
          <img src="{{ asset($stamps->footer) }}"  width="100%" height="100%"  id="image" readonly>
        </footer>
<main>

    <div class="panel panel-default">
    

    <div class="panel-body">

<br>
<br>
<br>
<br>
<br>
<br>

        <div class="mb-3" >
            {{ $archive->date}}-{{$archive->in}}-{{$archive->code }}<br>
   
 <?php 
 $codefi = $archive->date .'-'.  $archive->in.'-'. $archive->code ;
            echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($codefi , "C128",1.4,16) . '" alt="barcode"   />';


            ?>
        </div>
        <dl class="dl-horizontal">
          
        
          
           
          {!! $archive->message !!}
<br>
<br>
          <div class="row">
          <div class="col-md-3">
           
         <br>
         
       
          </div>
<div class="col-md-3"></div> <div class="col-md-3"></div>
           
         </div>


        </dl>


</div>







    </div>
</div>


</main>



  </body>
</html>