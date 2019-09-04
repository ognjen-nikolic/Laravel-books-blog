@extends('user.layout.layout_user')
@section('title')
    Prijava
@endsection
@section('content')
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3>Prijavite se</h3>
            <form name="sentMessage" id="contactForm" name="contactForm" method="post" action="{{asset('/prijava')}}">
                {{ csrf_field() }}
                <div class="control-group form-group">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Korisničko ime:</label>
                            <input type="text" class="form-control" id="tbKorisnickoIme" name="tbKorisnickoIme"/>
                        </div>
                    </div>
                    <div class="controls">
                        <label>Lozinka:</label>
                        <input type="password" class="form-control" id="tbLozinka" name="tbLozinka"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin">Prijavi se</button>
            </form>
        </div>
    </div>
    <p>Ukoliko nemate profil, registrujte se <a href="{{asset('/registracija-forma')}}">ovde</a>.</p>
    </div>

@endsection
