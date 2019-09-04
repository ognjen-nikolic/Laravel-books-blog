@extends('user.layout.layout_user')
@section('title')
    Knjige korisnika
@endsection
@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <br/>
                @foreach($knjige as $knjiga)
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="{{ asset($knjiga->putanja) }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{$knjiga->naziv}}</h2>
                            <p class="card-text">{{$knjiga->opis}}</p>
                            <a href="{{asset('/knjige/'.$knjiga->idRecenzija)}}" class="btn btn-primary">Pročitaj više &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            <b>Postavljeno: </b>{{$knjiga->datumKreiranja}}</br>
                            <b>Postavio/la korisnik: </b><a href="{{asset('/profil/'.$knjiga->idKorisnik)}}">{{$knjiga->korisnickoIme}}</a></br>
                            <b>Broj komentara: </b> {{$knjiga->brojKomentara}}</br>
                        </div>
                    </div>
                    <br/>
                @endforeach

            </div>

        </div>
        <!-- Pagination -->
        <div class="row pagination justify-content-center">
            <div >{{$knjige->links()}}</div>
        </div>
    </div>
@endsection