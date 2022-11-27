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
            {!! DNS1D::getBarcodeHTML($letter->code, "C128",1.4,16) !!}
        </div>

        <dl class="dl-horizontal">
          
            <dt>{{ trans('letters.from') }}</dt>
            <dd>{{ $letter->sender->first_name ." " . $letter->sender->last_name }}</dd>
            <dt>{{ trans('letters.to') }}</dt>
            <dd>{{  $letter->recever->first_name ." " . $letter->recever->last_name }}</dd>
            <br>
            <dd>{{ $letter->Subject }}</dd>
            <br>
          
           
          {!! $letter->message !!}
          <div class="col-md-3">
              @if($letter->Signature == '1')
         <h2> {{ $letter->sender->first_name ." " . $letter->sender->last_name }}</h2>
          <br>
          <img src="{{ asset($letter->sender->Signature) }}" style="    max-width: 300px;" type="text" id="image" readonly>
          @endif 
          </div>
         


        </dl>

<div class="col-md-12"  style="text-align: center;">
    <img src="{{ asset($stamps->image) }}" style="      max-width: 111px;
"  id="image" readonly>
 
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
      <button class="btn btn-success" title="{{ trans('letters.delete') }}" onclick="printReport()">
                                            Print
                                        </button>
</div>




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
