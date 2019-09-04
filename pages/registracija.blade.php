@extends('user.layout.layout_user')
@section('title')
    Registracija
@endsection
@section('content')
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="container">
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-lg-8 mb-4">
            <h3>Prijavite se</h3>
            <form name="sentMessage" id="contactForm" name="contactForm" method="post" action="{{ route('registracija') }}">
                {{ csrf_field() }}
                <div class="control-group form-group">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Korisničko ime:</label>
                            <input type="text" class="form-control" id="tbKorisnickoIme" name="tbKorisnickoIme"/>
                        </div>
                    </div>
                    <div class="controls">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" id="tbEmail" name="tbEmail"/>
                    </div>
                    <div class="controls">
                        <label>Lozinka:</label>
                        <input type="password" class="form-control" id="tbLozinka" name="tbLozinka"/>
                    </div>
                    <div class="controls">
                        <label>Lozinka (potvrda):</label>
                        <input type="password" class="form-control" id="tbLozinkaProvera" name="tbLozinkaProvera"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="btnReg" name="btnReg">Registruj se</button>
            </form>
        </div>
    </div>
    </div>

@endsection
