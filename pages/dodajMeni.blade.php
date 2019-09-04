@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">
        <div >
            <div id="dodajMeni">
                <form class="form-control" id="dodajMeni" name="dodajMeni" method="post" action="{{route('dodajMeniForma')}}" >
                    {{ csrf_field() }}
                    <h4 class="form-signin-heading">Dodaj meni</h4><br/>

                    <input type="text" name="tbMeni" id="tbMeni" placeholder="Naziv meni stavke" required="true" value="" /><br/>
                    <input type="text" name="tbPutanja" id="tbPutanja" placeholder="Naziv putanje stavke" required="true" value="" /><br/>

                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnDodaj" id="btnDodaj">Dodaj meni</button>  <br/>
                </form>
            </div>
        </div>
    </div>
@endsection