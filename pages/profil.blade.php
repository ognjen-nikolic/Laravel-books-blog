@extends('user.layout.layout_user')
@section('title')
    Profil
@endsection
@section('content')
<div class="container">
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <a href="{{ route('dodavanje-knjige') }}" class="btn btn-primary">Dodaj knjigu &rarr;</a>
            </div>
        </div>
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
                    <div class="card-footer text-muted">
                        Postavljeno {{$knjiga->datumKreiranja}}
                    </div>
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