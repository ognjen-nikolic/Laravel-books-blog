<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->

        <ul class="sidebar-menu">
            <li>
                <ul>
                    <a href="{{ route('kategorije') }}">
                        <li><h4>Kategorije</h4></li>
                        <li>Prikaz | Izmena | Brisanje</li>
                        <li>Dodavanje</li>
                    </a>

                </ul>
            </li>
            <hr>
            <li>
            <ul>
                <a href="{{ route('meni') }}">
                    <li><h4>Meni</h4></li>
                    <li>Prikaz | Izmena | Brisanje</li>
                    <li>Dodavanje</li>
                </a>
            </ul>
            </li>
            <hr>
            <li>
                <ul>
                    <a href="{{ route('korisnici') }}">
                        <li><h4>Korisnici</h4></li>
                        <li>Prikaz | Brisanje</li>
                        <li>Aktivnosti</li>
                    </a>
                </ul>
            </li>
            <hr>
            <li>
                <ul>
                    <a href="{{ route('komentar') }}">
                        <li><h4>Komentar</h4></li>
                        <li>Prikaz | Brisanje</li>
                    </a>
                </ul>
            </li>
            <hr>
            <li>
                <ul>
                    <a href="{{ route('recenzije') }}">
                        <li><h4>Recenzije - knjige</h4></li>
                        <li>Prikaz | Brisanje</li>
                    </a>

                </ul>
            </li>
        </ul>
    </section>
</aside>