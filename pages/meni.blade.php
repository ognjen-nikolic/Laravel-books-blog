@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">

        <div id='dodajMeni'>
            <h2>Meni upravljanje</h2>
            <table class="table">
                <tr>
                    <th>idMeni</th>
                    <th>meni</th>
                    <th>putanja</th>

                    <th><a class="btn btn-primary" href="{{route('dodajMeniForma')}}">Dodaj</a></th>
                </tr>
                @isset($meni)
                    @foreach($meni as $m)
                        <tr>
                            <td>{{$m->idMeni}}</td>
                            <td>{{$m->meni}}</td>
                            <td>{{$m->putanja}}</td>

                            <td><a href="{{route('izmeniMeniForma', ['id' => $m->idMeni])}}">Izmeni</a></td>
                            <td><a href="{{route('obrisiMeni', ['id' => $m->idMeni])}}">Obriši</a></td>
                        </tr>
                    @endforeach
                @endisset
            </table><hr><br/>
        </div>

    </div>



@endsection