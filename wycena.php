<?php
    include 'config.php';
    session_start();
    otworzPoloczenie();
    
    //jezeli uzytkownik jest zalogowany, przekieruj go na index.php
    if($_SESSION['logged']==false){
        header('Location: loginKlient.php');
        // echo '<p>Aby zlecić wycenę naprawy/przeglądu musisz się zalogować.</p>';
        exit();
	}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Druk offsetowy, druk cyfrowy, introligatornia">
    <meta name="author" content="Michał Sierotowicz, Kamil Poręba">
    <link rel="icon" href="startpage/img/faviconkw.ico">
    <title>eSerwis - Wycena </title>
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
    <main>
        <section class="page">
            <div class="container">
                <div class="row featurette">
                    <div class="col-md-3">
                        <button class="btn btn-light" type="submit">Nowe Zlecenie</button>
                        <button class="btn btn-light" type="submit">Wszystkie Zlecenia</button>
                        <button class="btn btn-light" type="submit">Moje dane</button>
                    </div>
                    
                    <div class="col-md-9">

                        <div class="row featurette">
                            <div class="col-md-5">
                                <form>
                                   
                                <div class="form-group">
                                    <label for="inputAddress">Marka:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Marka pojazdu">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Model:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Model pojazdu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Opis usterki:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" 
                                    placeholder="Tutaj szczegółowo usterkę pojazdu, na jej podstawie, oszacujemy koszt naprawy" rows="8"></textarea>
                                </div>


                                </form>
                            </div>

                            <div class="col-md-5">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Opis zlecenia:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" 
                                        placeholder="Tutaj opisz na czym ma polgać zlecenie" rows="6"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Etap realizacji:</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Gwarancja</option>
                                        <option>W trakcie realizacji</option>
                                        <option>Zrealizowano</option>>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Data przekazania pojazdu:</label>
                                        <input type="date" name="dataPrzekazaniaPojazdu" max="3000-12-31" 
                                                min="2019-01-01" class="form-control">    
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row featurette">
                            
                            <div class="col-md-12">
                                <label>Tutaj możesz dołączyć zdjęcie lub inny dokument dotyczący zlecenia:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="zdjecieUszkodzenia">
                                    <label class="custom-file-label" for="customFile">Wybierz plik</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- back to top button -->
                <button onclick="topFunction()" id="myBtn" title="Go to top">Wróć na górę</button>
                <br>

                <hr class="featurette-divider">

                <!-- FOOTER -->
                <footer class="container">
                    <div class="row">
                    <p>&copy; 2018 e-Serwis &middot; <a href="startpage/data/construction.html" class="text-success">Regulamin</a></p>
                </footer>
            </div>
        </section>

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
    <script>
        var category = document.getElementById('category');
        document.getElementById('marka').onchange = function() {
        var optionSelected = this.options[this.selectedIndex];
        if (optionSelected.textContent != '-') {
            if (optionSelected.dataset.val === '1') {
            category.value = 'FORD';
            }
            else if (optionSelected.dataset.val === '2')  {
            category.value='MFM101';
        }
            else if (optionSelected.dataset.val === '3')  {
            category.value='ABC';
        }
            else {
            category.value = 'PM130';
            }
        } else {
            category.value = '';
        }
        }
    </script>
</body>
</html>
