@extends('Backend.header')
@section('content')
<div id="main_content" class="shadoweffect">  
  <div class="container">
    <form>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      
      <div class="form-group">
        <div class="form-row">
          <div class="col-6 mb-3">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date">
          </div>
          <div class="col-6 mb-3">
            <label for="end_date">Last name</label>
            <input type="date" class="form-control" id="end_date">
          </div>
        </div>
      </div>
    


      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Event Name">
      </div>
      <div class="form-group">
        <label for="details">Details</label>
        <textarea class="form-control" id="details" rows="5"></textarea>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
          Facebook
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
          Google Calender
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
          Slack
        </label>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary mt-3 pr-5 pl-5">Post</button>
      </div>
    </form>
  </div>
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