@extends('user.layout.layout_user')

@section('title')
    Početna
    @endsection
@section('content')
    @include('user.components.header')
    <!-- Page Content -->
    <div class="container">
        <!-- Portfolio Section -->

        <div class="row">
            <h2>Najnovije</h2>
        </div>
        <hr>
        <div class="row">

            @foreach($knjige as $knjiga)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#" class="pop card-img-top">
                            <img class="card-img-top" src="{{ asset($knjiga->putanja) }}">
                        </a>
                        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Zatvori</span></button>
                                        <img src="" class="imagepreview" style="width: 100%;" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{ $knjiga->naziv }}</a>
                            </h4>
                            <p class="card-text">{{ $knjiga->opis }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('knjiga', ['id' => $knjiga->idRecenzija])}}" class="btn btn-primary">Pročitaj više</a>
                        </div>
                        <div class="card-footer text-muted">
                            <b>Postavljeno: </b>{{$knjiga->datumKreiranja}}</br>
                            <b>Postavio/la korisnik: </b><a href="{{asset('/profil/'.$knjiga->idKorisnik)}}">{{$knjiga->korisnickoIme}}</a></br>
                            <b>Broj komentara: </b> {{$knjiga->brojKomentara}}</br>
                        </div>
                    </div>
                </div>
            @endforeach

         </div>
        <div class="row">
            <h2>Najpopularnije</h2><br/>
        </div>
        <hr>
        <div class="row">

            @foreach($knjigep as $knjiga)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#" class="pop card-img-top">
                            <img class="card-img-top" src="{{ asset($knjiga->putanja) }}">
                        </a>
                        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Zatvori</span></button>
                                        <img src="" class="imagepreview" style="width: 100%;" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{ $knjiga->naziv }}</a>
                            </h4>
                            <p class="card-text">{{ $knjiga->opis }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('knjiga', ['id' => $knjiga->idRecenzija])}}" class="btn btn-primary">Pročitaj više</a>
                        </div>
                        <div class="card-footer text-muted">
                            <b>Postavljeno: </b>{{ $knjiga->datumKreiranja }}</br>
                            <b>Postavio/la korisnik: </b><a href="{{asset('/profil/'.$knjiga->idKorisnik)}}">{{$knjiga->korisnickoIme}}</a></br>
                            <b>Broj komentara: </b> {{ $knjiga->brojKomentara }} </br>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
@endsection