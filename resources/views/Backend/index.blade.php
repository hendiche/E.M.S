@extends('Backend.header')
@section('content')
<<<<<<< HEAD
<div id="main_content" class="shadoweffect">  
    
    <div class="title">Post Message:</div>
    <textarea id='entry_text_area' name="content" class="form-control my-editor"></textarea>

    <form id='entry_choices_area' action="/action_page.php">
        <div class="caption">Send as: </div>
        <select>
            <option value="person1">Person 1</option>
            <option value="person2">Person 2</option>
            <option value="person3">Person 3</option>
            <option value="person4">Person 4</option>
        </select><br>
        <input type="checkbox" name="facebook" value="Facebook">Facebook<br>
        <input type="checkbox" name="slack" value="Slack">Slack<br>
        <input type="checkbox" name="googlecalendar" value="Slack">Google Calendar<br>

        <input type="submit" value="Send">
    </form>

</div>
<!--I disabled because richtext doesn't seem to be needed -->
<!--script>
=======
  

    
    <textarea id='entry_text_area' name="content" class="form-control my-editor"></textarea>

    <form id='entry_choices_area' action="/action_page.php">
        <input type="checkbox" name="facebook" value="Facebook">Facebook<br>
        <input type="checkbox" name="slack" value="Slack">Slack<br>
        <input type="checkbox" name="googlecalendar" value="Slack">Google Calendar<br>
        <input type="submit" value="Send">
    </form>



<script>
>>>>>>> Entry
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
<<<<<<< HEAD
    /*file_browser_callback : function(field_name, url, type, win) {
=======
    file_browser_callback : function(field_name, url, type, win) {
>>>>>>> Entry
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
<<<<<<< HEAD
    }*/
  };

  tinymce.init(editor_config);
</script-->
=======
    }
  };

  tinymce.init(editor_config);
</script>
>>>>>>> Entry


@endsection 