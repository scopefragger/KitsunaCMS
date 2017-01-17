@extends('main')
@section('content')
    <div class="col-xs-12 ">
        <div class="col-xs-12">
            <p><b>Please RSVP Below</b></p>
            <p>Your Name</p>
            <form action="register">
                <input name="name" type="text" class="form-control" placeholder="Please enter" required>
                <p style="padding-top: 20px;">Email Address</p>
                <input name="email" type="email" class="form-control" placeholder="Please enter" required>
                <button>RSVP</button>
            </form>
        </div>
    </div>
@endsection