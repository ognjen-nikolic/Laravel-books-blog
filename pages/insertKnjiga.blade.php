@extends('user.layout.layout_user')
@section('title')
    Recenzija
@endsection
@section('content')
    @if(session('poruka'))
        {{ session('poruka') }}
    @endif

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 mb-4">
            </br>
                <h3>Recenzija</h3>
                <hr>
                <form name="sentMessage" id="contactForm" name="contactForm" method="POST" action="{{ route('dodavanje') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group form-group">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Naziv:</label>
                                <input type="text" class="form-control" id="tbNaziv" name="tbNaziv"/>
                            </div>
                        </div>
                        <div class="controls">
                            <label>Autor:</label>
                            <input type="text" class="form-control" id="tbAutor" name="tbAutor"/>
                        </div>
                    </br>
                        <div class="controls">
                            <label>Kategorija:</label>
                            <select name="ddlKategorija" id="ddlKategorija" class="">
                                <option value="0">Izaberi</option>
                                @foreach($kategorije as $kat)
                                <option value="{{$kat->idKategorija}}">{{$kat->kategorija}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="controls">
                            <label>Kratak opis:</label>
                            <textarea rows="5" cols="50" class="form-control" id="taKratakOpis" name="taKratakOpis"></textarea>
                        </div>
                        <div class="controls">
                            <label>Tekst:</label>
                            <textarea rows="5" cols="50" class="form-control" id="taTekst" name="taTekst"></textarea>
                        </div>
                        <div class="controls">
                            <label>Slika:</label>
                            <input type="file" class="form-control" id="fSlika" name="fSlika"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnUnesi" name="btnUnesi">Unesi</button>
                </form>
            </div>
        </div>
    </div>

@endsection
