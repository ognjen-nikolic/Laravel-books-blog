@extends('admin.template.layout_admin')
@section('content')
    <div class="content-wrapper">
        <div >
            <div id="meni">
                @isset($meni)
                    <form class="form-control" id="izmeniMeni" name="izmeniMeni" method="post" action="{{route('izmeniMeniProvera', ['id' => $meni->idMeni])}}" >
                        {{ csrf_field() }}
                        <h4 class="form-signin-heading">Dodaj meni</h4><br/>

                        <input type="text" name="tbMeni" id="tbMeni" placeholder="" required="true" value="{{ $meni->meni }}" /><br/>
                        <input type="text" name="tbPutanja" id="tbPutanja" placeholder="" required="true" value="{{ $meni->putanja }}" /><br/>
                        @endisset
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnIzmeni" id="btnIzmeni">Izmeni meni stavku</button>  <br/>
                    </form>
            </div>
        </div>
    </div>
@endsection