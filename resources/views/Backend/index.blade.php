@extends('Backend.layout')
@section('content')
<div id="main_content" class="shadoweffect">
  @if(session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
  @endif
    
    <div class="title">Post New Event:</div>
    <form novalidate method="POST" action="{{ route('submit')}}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        <textarea id='entry_text_area' name="content" class="form-control my-editor"></textarea>

        <div class="row">
          <div class="col form-group column" style="margin: 0 -15px 16px">
            <label for="example-datetime-local-input" class="col col-form-label">Date Time Start</label>
            <div class="col">
              <input class="form-control" type="datetime-local" value="" name="datetime_start" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}">
            </div>
          </div>
          <div class="col form-group column" style="margin: 0 -15px 16px">
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
            <a href="{{ route('back.oauth') }}" class="btn btn-success btn-sm float-right" style="margin-top: 3.5vh">Auth Google</a>
        </div>
    </form>
</div>


@endsection 