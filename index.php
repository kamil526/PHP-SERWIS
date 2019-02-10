<?php
    include 'topPage.php';
?>

<div class="container" md-14>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="startpage/img/foto1.JPG" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="w-100" src="startpage/img/foto2.JPG" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="w-100" src="startpage/img/foto3.jpg" alt="Third slide">
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
</div>

<div class="container marketing">
    <div class="row text-center">
        <div class="col-lg-4">
            <img class="rounded-circle" src="startpage/img/olej.jpg" alt="Wymiana Oleju" width="200" height="200">
            <h2 class=" text-success">Wymiana Oleju</h2>
            <p>Oferujemy wymianę oleju silnikowego przy zastosowaniu naszych olejów oraz dostarczonych przez klienta.</p>
            <p>
                <a class="btn btn-secondary" href="startpage/data/construction.php" role="button">Dowiedz się więcej &raquo;</a>
            </p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle" src="startpage/img/przeglad.jpg" alt="Druk cyfrowy" width="200" height="200">
            <h2 class=" text-success">Przegląd techniczny</h2>
            <p>Wykonujemy przegląd techniczny okresowy oraz przed pierwszą rejestracją pojazdu.</p>
            <p>
                <a class="btn btn-secondary" href="startpage/data/construction.php" role="button">Dowiedz się więcej &raquo;</a>
            </p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle" src="startpage/img/naprawy.jpg" alt="Introligatornia" width="200" height="200">
            <h2 class=" text-success">Naprawy</h2>
            <p>Nasi doświadczeni pracownicy wykonają dla Państwa dowolną naprawę z zakresu mechaniki pojazdowej.</p>
            <p>
                <a class="btn btn-secondary" href="startpage/data/construction.php" role="button">Dowiedz się więcej &raquo;</a>
            </p>
        </div>
    </div>

    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-success">Kompleksowy serwis klimatyzacji
                <span class="text-muted"></span>
            </h2>
            <p class="lead" align="justify">Oferujemy Państwu kompleksowy serwis klimatyzacji w Nowym Sączu.
            Klimatyzacja samochodowa wymaga regularnego roboczego przeglądu. 
            Nieprawidłowo działające urządzenie jest idealnym podłożem dla bakterii oraz grzybów, które wraz z powietrzem dostają się do wnętrza pojazdu wywołując u 
            pasażerów reakcje alergiczne oraz inne niepożądane skutki zdrowotne.
            Przeglądy klimatyzacji gwarantują nie tylko komfort jazdy ale również pozwalają wykryć drobne uszkodzenia i zapobiegają poważnym i bardzo kosztownym awariom.</p>
        </div>
        <div class="col-md-5">
            <img class="img-fluid mx-auto" src="startpage/img/klima.jpg">
        </div>
    </div>
    <hr class="featurette-divider">
    
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading text-success">Elektromechanika</h2>
            <p class="lead" align="justify">Współczesne samochody osobowe i użytkowe są wypełnione układami elektronicznymi,
                których sprawne działanie przekłada się na komfort i bezpieczeństwo jazdy.
                <br>Jeśli w Twoim samochodzie szwankuje elektronika lub zaświeci się czerwona kontrolka błędu, możesz polegać na naszych fachowcach
                którzy szybko zlokalizują i rozwiążą problem.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="img-fluid mx-auto" src="startpage/img/elektro.jpg">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-success">Wulkanizacja</h2>
            <p class="lead" align="justify">Nasz serwis wyposażony jest w najnowszej generacji urządzenia do wymiany oraz wyważania opon. <br>Współpracujemy z najbardziej prestiżowymi producentami opon, 
                felg stalowych, aluminiowych dzięki czemu jesteśmy w stanie zapewnić naszym klientom najwyższą jakość świadczonych usług oraz pełną gamę produktów.</p>
        </div>
        <div class="col-md-5">
            <img class="img-fluid mx-auto" src="startpage/img/wulkanizacja.jpg">
        </div>
    </div>
</div>

<?php
    include 'bottomPage.php';
?>      
