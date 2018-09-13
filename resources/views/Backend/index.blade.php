@extends('Backend.layout')
@section('content')
<div id="main_content" class="shadoweffect">  

    
    <div class="title">Post New Event:</div>
    <form novalidate method="POST" action="{{ route('submit')}}">
        {{ csrf_field() }}        
        
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Event Name">
        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col-6 mb-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date">
                </div>
                <div class="col-6 mb-3">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="entry_text_area">Details</label>
            <textarea id='entry_text_area' name="content" class="form-control my-editor"
            oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
        </div>

        <div id="entry_choices_area">
            <div class="caption">Send as: </div>
            <select>
                @foreach($posters as $poster) 
                    <option value="{!! $poster->id !!}"> {!! $poster->name !!} </option> 
                @endforeach
            </select><br>
            <div class="caption">Send to: </div><br>
            <input type="checkbox" name="facebook" value="Facebook">Facebook<br>
            <input type="checkbox" name="slack" value="Slack">Slack<br>
            <input type="checkbox" name="googlecalendar" value="Slack">Google Calendar<br>

            <input type="submit" value="Send">
        </div>
    </form>
</div>


@endsection 