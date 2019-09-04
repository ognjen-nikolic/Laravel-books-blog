@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">
        <div >
            <div id="dodajKategoriju">
                @isset($kategorija)
                <form class="form-control" id="izmeniKategoriju" name="izmeniKategoriju" method="post" action="{{route('izmeniKategorijuProvera', ['id' => $kategorija->idKategorija])}}" >
                    {{ csrf_field() }}
                    <h4 class="form-signin-heading">Dodaj kategoriju</h4><br/>

                    <input type="text" name="tbKategorija" id="tbKategorija" placeholder="" required="true" value="{{ $kategorija->kategorija }}" /><br/>
                    @endisset
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnIzmeni" id="btnIzmeni">Izmeni kategoriju</button>  <br/>
                </form>
            </div>
        </div>
    </div>
@endsection