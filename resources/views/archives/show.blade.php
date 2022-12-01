@extends('layouts.app')

@section('content')
<div id="reportPrinting">

    <div class="panel panel-default">
    

    <div class="panel-body">

        @php
$stamps = App\Models\stamp::first();

$users = App\Models\User::all();

@endphp
<div class="divheader">
 <img src="{{ asset($stamps->header) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly>
<br>
<br>
</div>
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


        <br>
<br>
<br>
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



<div class="divFooter"> <img src="{{ asset($stamps->footer) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly></div>



    </div>
</div>


</div>
<div>
 

      <button class="btn btn-success" title="{{ trans('archives.delete') }}" onclick="printReport()">
                                            Print
                                        </button>
</div>

<br>
<br>


@endsection

@section('js')


<script type="text/javascript">
    function printReport()
    {

var printContents = document.getElementById("reportPrinting").innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
    }

    var gAutoPrint = true;

function processPrint(){

if (document.getElementById != null){
var html = '<HTML>\n<HEAD>\n';
if (document.getElementsByTagName != null){
var headTags = document.getElementsByTagName("head");
if (headTags.length > 0) html += headTags[0].innerHTML;
}

html += '\n</HE' + 'AD>\n<BODY>\n';
var printReadyElem = document.getElementById("reportPrinting");

if (printReadyElem != null) html += printReadyElem.innerHTML;
else{
alert("Error, no contents.");
return;
}

html += '\n</BO' + 'DY>\n</HT' + 'ML>';
var printWin = window.open("","processPrint");
printWin.document.open();
printWin.document.write(html);
printWin.document.close();

if (gAutoPrint) printWin.print();
} else alert("Browser not supported.");

}

</script>





@endsection
