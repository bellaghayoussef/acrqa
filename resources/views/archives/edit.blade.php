@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($letter->Subject) ? $letter->Subject : 'Letter' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

              

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('archives.archive.update', $letter->id) }}" id="edit_letter_form" name="edit_letter_form" accept-charset="UTF-8" class="form-horizontal row">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('archives.form', [
                                        'letter' => $letter,
                                      ])

                        <input class="btn btn-primary" type="submit" value="{{ trans('letters.update') }}">



                        
               


        
        

                
            </form>

        </div>
    </div>

@endsection

@section('js')
  <script src="https://taufcrmsg.com/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>

    <script type="text/javascript"> 

$('#flexCheckDefault').change(function() {
  if($(this).prop('checked')){
$("#image").show();
$("#Signature").val('1');

  }else{
    $("#image").hide();
    $("#Signature").val('0');
  }
})
  </script>
@endsection