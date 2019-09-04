@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">

        <div id='komentar'>
            <h2>Komentar upravljanje</h2>
            <table class="table">
                <tr>
                    <th>idKomentar</th>
                    <th>komentar</th>
                    <th>korisnickoIme</th>
                    <th>naziv</th>
                    <th>datumKreiranja</th>
                    <th>Obriši</th>
                </tr>
                @isset($komentar)
                    @foreach($komentar as $k)
                        <tr>
                            <td>{{$k->idKomentar}}</td>
                            <td>{{$k->komentar}}</td>
                            <td>{{$k->korisnickoIme}}</td>
                            <td>{{$k->naziv}}</td>
                            <td>{{$k->datumKreiranja}}</td>
                            <td><a href="{{route('obrisiKomentar', ['id' => $k->idKomentar])}}">Obriši</a></td>
                        </tr>
                    @endforeach
                @endisset
            </table><hr><br/>
        </div>

    </div>



@endsection