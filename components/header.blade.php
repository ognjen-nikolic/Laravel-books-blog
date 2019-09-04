
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('{{asset('/img/banner1.jpg')}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Napraviti biblioteku u kući, znači podariti joj dušu.</h3>
                    <p>Ciceron</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{asset('/img/banner2.jpg')}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Biblioteke se ne prave, one rastu.</h3>
                    <p>Agustin Birel</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{asset('/img/banner3.jpg')}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Šta je drugo čitanje nego razgovor u tišini.</h3>
                    <p>Volter Sevidž Lendor</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>