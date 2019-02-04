<?php
    include 'topPage.php';
    otworzPoloczenie();
?>
    <!--Carousel -->
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
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

    <!-- Marketing / 3 kolumny pod karuzelą-->
<div class="container marketing">
    <div class="row text-center">
        <div class="col-lg-4">
            <img class="rounded-circle" src="startpage/img/olej.jpg" alt="Wymiana Oleju" width="200" height="200">
            <h2 class=" text-success">Wymiana Oleju</h2>
            <p>Oferujemy wymianę oleju silnikowego przy zastosowaniu naszych olejów oraz dostarczonych przez klienta.</p>
            <p>
                <a class="btn btn-secondary" href="startpage/data/construction.html" role="button">Dowiedz się więcej &raquo;</a>
            </p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle" src="startpage/img/przeglad.jpg" alt="Druk cyfrowy" width="200" height="200">
            <h2 class=" text-success">Przegląd techniczny</h2>
            <p>Wykonujemy przegląd techniczny okresowy oraz przed pierwszą rejestracją pojazdu.</p>
            <p>
                <a class="btn btn-secondary" href="startpage/data/construction.html" role="button">Dowiedz się więcej &raquo;</a>
            </p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle" src="startpage/img/naprawy.jpg" alt="Introligatornia" width="200" height="200">
            <h2 class=" text-success">Naprawy</h2>
            <p>Nasi doświadczeni pracownicy wykonają dla Państwa dowolną naprawę z zakresu mechaniki oraz elektromechaniki pojazdowej.</p>
            <p>
                <a class="btn btn-secondary" href="startpage/data/construction.html" role="button">Dowiedz się więcej &raquo;</a>
            </p>
        </div>
    </div>

    <!-- Featurettes -->
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-success">Lorem Ipsum
                <span class="text-muted"></span>
            </h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="startpage/img/car4.jpg" alt="oprawa twarda">
        </div>
    </div>
    <hr class="featurette-divider">
    
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading text-success">Lorem Ipsum</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="startpage/img/car3.jpg" alt="wizytówka">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-success">Lorem Ipsum</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="startpage/img/car2.jpg" alt="uszlachetnienia">
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading text-success">Lorem Ipsum</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="startpage/img/car1.png" alt="wizytówka">
        </div>
    </div>
</div>

<?php
    include 'bottomPage.php';
?>      
