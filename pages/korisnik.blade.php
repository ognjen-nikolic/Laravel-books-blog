@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">

        <div id='korisnik'>
            <h2>Korisnik upravljanje</h2>
            <table class="table">
                <tr>
                    <th>idKorisnik</th>
                    <th>korisnickoIme</th>
                    <th>email</th>
                    {{--<th>lozinka</th>--}}
                    <th>uloga</th>
                </tr>
                @isset($korisnik)
                    @foreach($korisnik as $k)
                        <tr>
                            <td>{{$k->idKorisnik}}</td>
                            <td>{{$k->korisnickoIme}}</td>
                            <td>{{$k->email}}</td>
                            <td>{{$k->uloga}}</td>
                            <td><a href="{{route('obrisiKorisnika', ['id' => $k->idKorisnik])}}">Obriši</a></td>
                            <td><a href="{{route('aktivnostiKorisnika', ['id' => $k->idKorisnik])}}">Aktivnosti</a></td>
                        </tr>
                    @endforeach
                @endisset
            </table><hr><br/>
        </div>

    </div>



@endsection