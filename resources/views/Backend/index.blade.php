@extends('Backend.layout')
@section('content')
<div id="main_content" class="shadoweffect">
  @if(session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
  @endif
    
    <div class="title">Post Message:</div>
    <form novalidate method="POST" action="{{ route('submit')}}">
        {{ csrf_field() }}
        <div class="form-group" style="width: 80%; margin: 0 auto 16px;">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        <textarea id='entry_text_area' name="content" class="form-control my-editor"></textarea>

        <div class="row" style="width: 80%; margin: auto;">
          <div class="col form-group column" style="margin: 0 -25px 16px">
            <label for="example-datetime-local-input" class="col col-form-label">Date Time Start</label>
            <div class="col">
              <input class="form-control" type="datetime-local" value="" name="datetime_start" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}">
            </div>
          </div>
          <div class="col form-group column" style="margin: 0 -25px 16px">
            <label for="example-datetime-local-input" class="col col-form-label">Date Time End</label>
            <div class="col">
              <input class="form-control" type="datetime-local" value="" name="datetime_end" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}">
            </div>
          </div>
        </div>
        <div id="entry_choices_area">
            {{-- <div class="caption">Send as: </div> --}}
            {{-- <select>
                @foreach($posters as $poster) 
                    <option value="{!! $poster->id !!}"> {!! $poster->name !!} </option> 
                @endforeach
            </select><br> --}}
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facebook" value="Facebook" id="facebook">
              <label class="form-check-label" for="facebook">Facebook</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="slack" value="Slack" id="slack">
              <label class="form-check-label" for="slack">Slack</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="googlecalendar" value="Googlecalendar" id="googlecalendar">
              <label class="form-check-label" for="googlecalendar">Google Calendar</label>
            </div>

            <input type="submit" value="Send" class="btn btn-primary btn-lg">
            <a href="{{ route('back.oauth') }}" class="btn btn-success btn-sm float-right" style="margin-top: 2vh">Auth Google</a>
        </div>
    </form>

</div>
<!--I disabled because richtext doesn't seem to be needed -->
<!--script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    /*file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }*/
  };

  tinymce.init(editor_config);
</script-->


@endsection 