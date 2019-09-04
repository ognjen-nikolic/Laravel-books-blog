@extends('user.layout.layout_user')
@section('title')
    Kontakt
@endsection
@include('user.components.header')
@section('content')
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    </br>
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Pošaljite nam poruku</h3>
            <form name="sentMessage" id="contactForm" name="contactForm" method="post" action="{{ asset('/kontakt') }}">
                {{ csrf_field() }}
                <div class="control-group form-group">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email:</label>
                            <input type="email" class="form-control" id="tbEmail" name="tbEmail" />
                        </div>
                    </div>
                    <div class="controls">
                        <label>Naslov:</label>
                        <input type="text" class="form-control" id="tbNaslov" name="tbNaslov"/>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Poruka:</label>
                        <textarea rows="10" cols="100" class="form-control" id="taPoruka" name="taPoruka"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="btnPosalji" name="btnPosalji">Pošalji</button>
            </form>
        </div>
    </div>
    </div>

@endsection
