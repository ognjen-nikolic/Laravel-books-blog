@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">

        <div id='dodajKategoriju'>
            <h2>Kategorija upravljanje</h2>
                <table class="table">
                    <tr>
                        <th>idKategorija</th>
                        <th>kategorija</th>
                        <th><a class="btn btn-primary" href="{{route('dodajKategorijuForma')}}">Dodaj</a></th>
                    </tr>
                    @isset($kategorija)
                    @foreach($kategorija as $k)
                        <tr>
                            <td>{{$k->idKategorija}}</td>
                            <td>{{$k->kategorija}}</td>
                            <td><a href="{{route('izmeniKategorijuForma', ['id' => $k->idKategorija])}}">Izmeni</a></td>
                            <td><a href="{{route('obrisiKategoriju', ['id' => $k->idKategorija])}}">Obriši</a></td>
                        </tr>
                    @endforeach
                    @endisset
                </table><hr><br/>
        </div>

</div>



@endsection