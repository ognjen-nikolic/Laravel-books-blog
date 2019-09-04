@extends('user.layout.layout_user')
@section('title')
    Autor
@endsection
@include('user.components.header')
@section('content')
    <div class="container">
    </br>
<div class="row">
    <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" src="{{asset('/img/ja.jpg')}}" width="50%" height="50%">
    </div>
    <div class="col-lg-6">
        <h2>Autor sajta</h2>
        <h3>Ognjen Nikolic 29/15</h3>
        <p>Student sam završne godine Visoke ICT škole, smer Web programiranje i veliki sam ljubitelj knjiga.</p>
        <p>Sajt je napravljen u Laravel framework-u kao školski projekat za predmet Web programiranje PHP2.</p>
    </div>
</div>
    </div>
@endsection
