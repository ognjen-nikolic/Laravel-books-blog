@extends('user.layout.layout_user')
@section('title')
    Knjiga
@endsection
@section('content')
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{$knjiga->naziv}}
        <small>korisnika
            <a href="{{ asset('/profil/'.$knjiga->idKorisnik) }}">{{$knjiga->korisnickoIme}}</a>
        </small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('pocetna') }}">Početna</a>
        </li>
        <li class="breadcrumb-item active">Recenzija &nbsp</li>
        @isset($profil)
        @if($profil->idKorisnik==$knjiga->idKorisnik)
        <a href="{{ asset('/izmenaknjige/'.$knjiga->idRecenzija) }}"><li class="breadcrumb-item">Izmeni &nbsp</li></a>
        <a href="{{ asset('/obrisiRecenziju/'.$knjiga->idRecenzija) }}"><li class="breadcrumb-item">Obriši</li></a>
            @endif
            @endisset
</ol>

<div class="row">

<!-- Post Content Column -->
<div class="col-lg-12">

    <!-- Preview Image -->
    {{--<img class="img-fluid rounded" src="{{ asset($knjiga->putanja) }}" alt="">--}}
    <a href="#" class="pop">
        <img src="{{ asset($knjiga->putanja) }}">
    </a>
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;" >
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Date/Time -->
    <p><b>Postavljeno: </b>{{ $knjiga->datumKreiranja }}</p></br>
    <p><b>Autor: </b>{{ $knjiga->autor }}</p></br>
    <p><b>Kategorija: </b></p></br>
    <p><b>Opis: </b>{{ $knjiga->opis }}</p>

    <hr>

    <!-- Post Content -->
    <p >
        {{ $knjiga->tekst }}
    </p>


    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Ostavite komentar:</h5>
        <div class="card-body">
            <form method="post" action="{{ asset('/knjiga/'.$knjiga->idRecenzija.'/korisnik/'.$knjiga->idKorisnik) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    @if(!session('korisnik'))
                        <p> Morate biti ulogovani da biste ostavili komentar.</p>
                        <textarea disabled class="form-control" rows="3" id="taKomentar" name="taKomentar"></textarea>
                        <br><button disabled type="submit" class="btn btn-primary" id="btnObjavi" name="btnObjavi">Objavi</button>

                    @else
                        <textarea class="form-control" rows="3" id="taKomentar" name="taKomentar"></textarea>
                        <br><button type="submit" class="btn btn-primary" id="btnObjavi" name="btnObjavi">Objavi</button>

                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Single Comment -->
    @foreach($komentar as $kom)
    <div class="media mb-4">
        <div class="media-body">
            <h5 class="mt-0">{{ $kom->korisnickoIme }}</h5>
            {{ $kom->komentar }}
        </div>
    </div>
    @endforeach
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@endsection
