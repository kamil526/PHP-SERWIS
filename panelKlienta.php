<?php
    session_start();
    include 'config.php';
    otworzPoloczenie();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Druk offsetowy, druk cyfrowy, introligatornia">
    <meta name="author" content="Michał Sierotowicz, Kamil Poręba">
    <link rel="icon" href="startpage/img/faviconkw.ico">
    <title>eSerwis - Panel Klienta</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="startpage/css/styles.css">
    <link rel="stylesheet" href="startpage/css/bootstrap.css">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgba(255, 255, 255, 0.9);">
        <a class="navbar-brand" href="#">
            <img src="startpage/img/logo.png" height="70" class="d-inline-block align-top" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto font-weight-bold">
            <li class="nav-item active">
              <a class="nav-link text-success " href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="startpage/data/construction.html">O firmie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="startpage/data/construction.html">Oferta i cennik</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="startpage/data/construction.html">Rezerwacja</a>
            </li>
          </ul>  

          <ul class="navbar-nav mr-auto font-weight-bold">

          <?php
                if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
                echo
                '
                
                    <li class="nav-item">
                        <a class="nav-link">Witaj, '. $_SESSION['login']. '</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"> Wyloguj</a>
                    </li>
              
                ';
                }else{
                    echo
                    '
                    <li class="nav-item">
                    <a class="nav-link" href="loginKlient.php">Panel Klienta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="startpage/data/construction.html">Panel Użytkownika</a>
                    </li>
                    ';
                }   
            ?>
          </ul>
        </div>
      </nav>
    </header>
    <!-- back to top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Wróć na górę</button>
    <br>
    <br>
    <br>
    <!-- Carousel -->
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
                <p>Nasi doświadczeni pracownicy wykonają dla Państwa dowo</p>
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
        <hr class="featurette-divider">
        </div>

      <!-- FOOTER -->
      <footer class="container">
        <div class="row">
        <p>&copy; 2018 e-Serwis &middot; <a href="startpage/data/construction.html" class="text-success">Regulamin</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="startpage/data/backtotop.js"></script>
    <!-- back to top button -->
    <script>
            //przycisk pojawia się gdy zjedziemy w dól o 20px
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }
            //kiedy klikniemy przycisk wracamy na górę strony
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
    </script>  
</body>
</html>
