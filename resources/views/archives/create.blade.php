@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('letters.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('archives.archive.index') }}" class="btn btn-primary" title="{{ trans('letters.show_all') }}">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
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

            <form method="POST" action="{{ route('archives.archive.store') }}" accept-charset="UTF-8" id="create_letter_form" name="create_letter_form" class="form-horizontal row">
            {{ csrf_field() }}
            @include ('archives.form', [
                                        'letter' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('letters.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


@section('js')
  <script src="https://cdn.tiny.cloud/1/sf7otzj7k5k1q17yvc0vo0nco5kdhl5ls20rdeb429v8mpgz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

