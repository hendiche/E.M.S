@extends('Backend.header')
@section('content')
  
    <textarea id='entry_text_area'>
    Lorem ipsum and shit
    </textarea>

    <form id='entry_choices_area' action="/action_page.php">
        <input type="checkbox" name="facebook" value="Facebook">Facebook<br>
        <input type="checkbox" name="slack" value="Slack">Slack<br>
        <input type="checkbox" name="googlecalendar" value="Slack">Google Calendar<br>
        <input type="submit" value="Send">
    </form>
@endsection 