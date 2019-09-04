@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">

        <div id='korisnik'>
            <h2>Recenzije upravljanje</h2>
            <table class="table" style="font-size:70%">
                <tr>
                    <th>idRecenzija</th>
                    <th>naziv</th>
                    <th>autor</th>
                    <th>opis</th>
                    <th>tekst</th>
                    <th>datumKreiranja</th>
                    <th>datumIzmene</th>
                    <th>putanja</th>
                    <th>korisnickoIme</th>
                    <th>kategorija</th>
                    <th>brojKomentara</th>
                    <th>uloga</th>
                    <th>upravljaj</th>
                </tr>
                @isset($recenzije)
                    @foreach($recenzije as $r)
                        <tr>
                            <td>{{$r->idRecenzija}}</td>
                            <td>{{$r->naziv}}</td>
                            <td>{{$r->autor}}</td>
                            <td>{{$r->opis}}</td>
                            <td>{{$r->tekst}}</td>
                            <td>{{$r->datumKreiranja}}</td>
                            <td>{{$r->datumIzmene}}</td>
                            <td>{{$r->putanja}}</td>
                            <td>{{$r->korisnickoIme}}</td>
                            <td>{{$r->kategorija}}</td>
                            <td>{{$r->brojKomentara}}</td>
                            <td>{{$r->uloga}}</td>
                            <td><a href="{{route('obrisiRecenziju', ['id' => $r->idRecenzija])}}">Obriši</a></td>
                        </tr>
                    @endforeach
                @endisset
            </table><hr><br/>
        </div>

    </div>



@endsection