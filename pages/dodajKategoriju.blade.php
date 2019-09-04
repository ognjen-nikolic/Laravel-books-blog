@extends('admin.template.layout_admin')
@section('content')
<div class="content-wrapper">
    <div >
        <div id="dodajKategoriju">
            <form class="form-control" id="dodajKategoriju" name="dodajKategoriju" method="post" action="{{route('dodajKategorijuForma')}}" >
                {{ csrf_field() }}
                <h4 class="form-signin-heading">Dodaj kategoriju</h4><br/>

                <input type="text" name="tbKategorija" id="tbKategorija" placeholder="Naziv kategorije" required="true" value="" /><br/>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnDodaj" id="btnDodaj">Dodaj kategoriju</button>  <br/>
            </form>
        </div>
    </div>
</div>
@endsection