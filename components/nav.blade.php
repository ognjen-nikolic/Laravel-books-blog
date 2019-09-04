<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pocetna') }}">Book corner</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <p style="color:white">
            @if(session('poruka'))
                {{ session('poruka') }}
            @endif
        </p>

            @isset($meni)
                <ul class="navbar-nav ml-auto">
                    @foreach($meni as $m)
                        @if(session('korisnik') || session('admin'))
                            @if($m->meni == "Prijava")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{asset('/odjava')}}">Odjava</a>
                                </li>
                                @else
                                <li class="nav-item">
                                <a class="nav-link  {{ ($m->putanja) ? 'active' : '' }}" href="{{ asset($m->putanja)}}">{{  $m->meni }}</a>
                            </li>
                            @endif
                        @else
                            @if($m->meni == "Profil")
                                <li class="nav-item"></li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link  {{ ($m->putanja) ? 'active' : '' }}" href="{{ asset($m->putanja)}}">{{  $m->meni }}</a>
                            </li>
                            @endif
                        @endif

                    @endforeach
                </ul>
            @endisset
        </div>
    </div>
</nav>