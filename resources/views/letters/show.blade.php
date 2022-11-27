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

        <div class="mb-3" style="align-self: flex-end;">
            {{ $letter->code }}<br>
   {!! DNS1D::getBarcodePNG($letter->code, "C128",1.4,16) !!}
 <?php 
            echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($letter->code, "C128",1.4,16) . '" alt="barcode"   />';
            ?>
        </div>
        <dl class="dl-horizontal">
          
        
          
           
          {!! $letter->message !!}
<br>
<br>
          <div class="row">
          <div class="col-md-3">
           
         <h2> {{ $letter->sender->first_name ." " . $letter->sender->last_name }}</h2>
         <br>
          <h3> {{ $letter->sender->Profession }}</h3>
          <br>
          <img src="{{ asset($letter->sender->Signature) }}" style="    max-width: 300px;" type="text" id="image" readonly>
       
          </div>
<div class="col-md-3"></div> <div class="col-md-3"></div>
           <div class="col-md-3">
              @if($letter->accepted != null)
         <h2> {{ $letter->recever->first_name ." " . $letter->recever->last_name }}</h2>
         <br>
          <h3> {{ $letter->recever->Profession }}</h3>
          <br>
          <img src="{{ asset($letter->recever->Signature) }}" style="    max-width: 300px;" type="text" id="image" readonly>
          @endif 
          </div>
         </div>


        </dl>


</div>

<br>
<br>
<br>
<br>
<br>
<br>


<div class="divFooter"> <img src="{{ asset($stamps->footer) }}" style="      max-height: 111px;
    min-width: -webkit-fill-available;"  id="image" readonly></div>



    </div>
</div>


</div>
<div>
    @if($letter->to == auth()->user()->id && $letter->accepted != 1)
 
                        <a class="btn btn-success" href="{{route('accepted',$letter->id)}}" value="{{ trans('letters.update') }}">{{ trans('letters.accepted') }}</a>
                 
 @endif

      <button class="btn btn-success" title="{{ trans('letters.delete') }}" onclick="printReport()">
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
