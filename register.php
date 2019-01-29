<?php
    session_start(); 
    include 'config.php';
    otworzPoloczenie();
    
    // sprawdzamy czy user nie jest przypadkiem zalogowany
    if(!($_SESSION['logged'] ?? '')) {
        // jeśli zostanie naciśnięty przycisk "Zarejestruj"
        if(isset($_POST['login'])) {
            //pobieramy dane z pól
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';
            $password2 = $_POST['password2'] ?? '';
            $imie = $_POST['imie'] ?? '';
            $nazwisko = $_POST['nazwisko'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefon = $_POST['telefon'] ?? '';
             //dane adresowe
            $ulica = $_POST['ulica'] ?? '';
            $nrDomu = $_POST['nrDomu'] ?? '';
            $kodPocztowy = $_POST['kodPocztowy'] ?? '';
            $miasto = $_POST['miasto'] ?? '';
            //dane firmy
            $nip = $_POST['nip'] ?? '';
            $nazwaFirmy = $_POST['nazwaFirmy'] ?? '';
            $nazwaBanku = $_POST['nazwaBanku'] ?? '';

            // sprawdzamy czy wszystkie pola zostały wypełnione
            if(empty($login) || empty($password) || empty($password2)) {
                echo '<p>Musisz wypełnić wszystkie obowiązkowe pola.</p>';
            // sprawdzamy czy podane dwa hasła są takie same
            } elseif($password != $password2) {
                echo '<p>Podane hasła różnią się od siebie.</p>';
            } else {
                // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
                $sql="SELECT Count(idKlienta) FROM Klienci WHERE login = '$login'";
                $result = mysqli_query($polaczenie, $sql);
                $row = mysqli_fetch_row($result);
                if($row[0] > 0) {
                    echo '<p>Już istnieje użytkownik z takim loginem.</p>';
                } else {
                    // jeśli nie istnieje to kodujemy haslo...
                    $password = hashHaslo($_POST['password']);
                    // i wykonujemy zapytanie na dodanie usera
                    $sql="INSERT INTO Klienci (login, haslo, imie, nazwisko, email, telefon, ulica
                                                , nrDomu, kodPocztowy, miasto, nip, nazwaFirmy, nazwaBanku)
                        VALUES ('$login', '$password', '$imie', '$nazwisko', '$email','$telefon', '$ulica'
                                , '$nrDomu', '$kodPocztowy', '$miasto', '$nip', '$nazwaFirmy', '$nazwaBanku')";
                    mysqli_query($polaczenie, $sql);
                    echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginKlient.php">zalogować</a>.</p>';
                }
            }
        }
    
        // wyświetlamy formularz
        echo '
        
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Druk offsetowy, druk cyfrowy, introligatornia">
            <meta name="author" content="Michał Sierotowicz, Kamil Poręba">
            <link rel="icon" href="startpage/img/faviconkw.ico">
            <title>eSerwis - Samochodowy </title>
            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- Custom CSS -->
            <link rel="stylesheet" href="startpage/css/styles.css">
            <link rel="stylesheet" href="startpage/css/bootstrap.css">
        </head>

        <body>
            <header>
        <form method="post" action="register.php">
            <center>
                <p>
                    Login:<br>
                    <input type="text" value="'.($login ?? '').'" name="login" >
                </p>

                <p>
                    Hasło:<br>
                    <input type="password" value="'.($password ?? '').'" name="password">
                </p>
                <p>
                    Powtórz hasło:<br>
                    <input type="password" value="'.($password2 ?? '').'" name="password2">
                </p>

                <p>
                    Imie:<br>
                    <input type="text" value="'.($imie ?? '').'" name="imie">
                </p>
                <p>
                    Nazwisko:<br>
                    <input type="text" value="'.($nazwisko ?? '').'" name="nazwisko">
                </p>
                <p>
                    Email:<br>
                    <input type="text" value="'.($email ?? '').'" name="email">
                </p>
                <p>
                    Telefon:<br>
                    <input type="text" value="'.($telefon ?? '').'" name="telefon">
                </p>
                <p>
                    Ulica:<br>
                    <input type="text" value="'.($ulica ?? '').'" name="ulica">
                </p>
                <p>
                    Nr. domu:<br>
                    <input type="text" value="'.($nrDomu ?? '').'" name="nrDomu">
                </p>
                <p>
                    Kod pocztowy:<br>
                    <input type="text" value="'.($kodPocztowy ?? '').'" name="kodPocztowy">
                </p>

                <p>
                    Miasto:<br>
                    <input type="text" value="'.($miasto ?? '').'" name="miasto">
                </p>

                <p>
                    NIP:<br>
                    <input type="text" value="'.($nip ?? '').'" name="nip">
                </p>

                <p>
                    Nazwa firmy:<br>
                    <input type="text" value="'.($nazwaFirmy ?? '').'" name="nazwaFirmy">
                </p>

                <p>
                    Nazwa banku:<br>
                    <input type="text" value="'.($nazwaBanku ?? '').'" name="nazwaBanku">
                </p>
                <p>
                    <input type="submit" value="Zarejestruj" name="zarejestruj">
                </p>
            </center>
        </form>
        </body>
        </html>
        ';
    } else {
        echo 
            '
                <p>Jesteś już zalogowany, więc nie możesz stworzyć nowego konta.</p>
                <p>[<a href="index.php">Powrót</a>]</p>
            ';
        }

    zamknijPoloczenie();
?>