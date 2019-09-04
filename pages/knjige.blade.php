@extends('user.layout.layout_user')
@section('title')
    Knjige
    @endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Knjige</h1>
        <!-- Search Widget -->
        <div class="card mb-4">

            <div class="card-body">
                <div class="input-group">
                    <select name="ddlKategorija" id="ddlKategorija">
                        <option value="0">Izaberi</option>
                        @foreach($kategorije as $kat)
                            <option value="{{$kat->idKategorija}}">{{$kat->kategorija}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <input type="text" id="tbPretraga" name="tbPretraga" placeholder="Pretraga po imenu"/>
                </div>
                <input type="button" id="btnPretraga" value="Pretraga">
            </div>
        </div>
        <hr>
        <div class="row" id="knjige">
            {{--<div id="ispis">--}}
            @isset($knjige)
        @foreach($knjige as $knjiga)
            <div class="col-lg-3 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{ asset($knjiga->putanja) }}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{ $knjiga->naziv }}</a>
                        </h4>
                        <p class="card-text">{{ $knjiga->opis }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{asset('/knjige/'.$knjiga->idRecenzija)}}" class="btn btn-primary">Pročitaj više</a>
                    </div>
                    <div class="card-footer text-muted">
                        <b>Postavljeno: </b>{{$knjiga->datumKreiranja}}</br>
                        <b>Postavio/la korisnik: </b><a href="{{asset('/profil/'.$knjiga->idKorisnik)}}">{{$knjiga->korisnickoIme}}</a></br>
                        <b>Broj komentara: </b> {{$knjiga->brojKomentara}}</br>
                    </div>
                </div>
            </div>
            @endforeach

            @endisset
            {{--</div>--}}

        </div>
        <!-- Pagination -->
        <div class="row pagination justify-content-center">
            <div >{{$knjige->links()}}</div>
        </div>


    </div>
    <!-- /.container -->
    @endsection
