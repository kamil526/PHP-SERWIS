<?php
    session_start();
    include 'config.php';
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Druk offsetowy, druk cyfrowy, introligatornia">
    <meta name="author" content="Michał Sierotowicz, Kamil Poręba">
    <link rel="icon" href="startpage/img/faviconkw.ico">
    <title>eSerwis - Samochodowy </title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                  <a class="nav-link" href="wycena.php">Wycena</a>
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
  <hr class="featurette-divider"> 
  <hr>
