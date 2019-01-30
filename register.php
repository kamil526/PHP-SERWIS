<?php
    session_start(); 
    include 'config.php';
    otworzPoloczenie();
?>

<?php   
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
?>
        
    <!doctype html>
    <html lang="pl">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Serwis samochodowy, naprawy samochodowe, wymiana oleju">
            <meta name="author" content="Michał Sierotowicz, Kamil Poręba">
            <link rel="icon" href="startpage/img/faviconkw.ico">
            <title>eSerwis - Rejestracja </title>
            <!-- Bootstrap core CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <!-- Custom CSS -->
            <link rel="stylesheet" href="startpage/css/styles.css">
            <link rel="stylesheet" href="startpage/css/bootstrap.css">
        </head>

        <body> 
            <form method="post" action="register.php">
            <div class="container">
                <div class="row">

                    <div class="col">
                        <h3>Dane konta:</h3><br>

                        <label class="w3-text-green"><b>Login:</b></label>
                        <input type="text" class="form-control" name="login" placeholder="pole wymagane">

                        <label class="w3-text-green"><b>Hasło:</b></label>
                        <input type="password" class="form-control" name="password" placeholder="pole wymagane">

                        <label class="w3-text-green"><b>Powtórz hasło:</b></label>
                        <input type="password" class="form-control" name="password2" placeholder="pole wymagane">
                        
                    </div>
                    <div class="col">
                        <h3>Dane adresowe:</h3><br>

                        <label class="w3-text-green"><b>Imię:</b></label>
                        <input type="text" class="form-control" name="imie">

                        <label class="w3-text-green"><b>Nazwisko:</b></label>
                        <input type="text" class="form-control" name="nazwisko">

                        <label class="w3-text-green"><b>Adres E-mail:</b></label>
                        <input type="text" class="form-control" name="email">

                        <label class="w3-text-green"><b>Telefon:</b></label>
                        <input type="text" class="form-control" name="telefon">

                        <label class="w3-text-green"><b>Ulica:</b></label>
                        <input type="text" class="form-control" name="ulica">
                        
                        <label class="w3-text-green"><b>Numer domu:</b></label>
                        <input type="text" class="form-control" name="nrDomu">
                        
                        <label class="w3-text-green"><b>Kod pocztowy:</b></label>
                        <input type="text" class="form-control" name="kodPocztowy">
                        
                        <label class="w3-text-green"><b>Miasto:</b></label>
                        <input type="text" class="form-control" name="miasto">

                        <br><br><br>

                        <center>
                        <input class="w3-btn w3-green" type="submit" value="Zarejestruj" name="zarejestruj">
                        </center>
                        
                    </div>
                    <div class="col">
                     <h3>Dane firmy:</h3><br>
                        
                        <label class="w3-text-green"><b>Nazwa firmy:</b></label>
                        <input type="text" class="form-control" name="nazwaFirmy">

                        <label class="w3-text-green"><b>NIP:</b></label>
                        <input type="text" class="form-control" name="nip">
                        
                    </div>
                </div>
            </div>
                <!-- <center>
                <table>
                    <tr>
                        <td>Login: 
                        <td><input type="text" name="login" >
                    </tr>
                    <br>

                    <tr>
                        <td>Hasło: 
                        <td><input type="password" name="password">
                    </tr>

                    <tr>
                        <td>Powtórz hasło: 
                        <td><input type="password" name="password2">
                    </tr>

                    <tr>
                        <td>Imie:  
                        <td><input type="text" name="imie">
                    </tr>

                    <tr>
                        <td>Nazwisko: 
                        <td><input type="text" name="nazwisko">
                    </tr>

                    <tr>
                        <td>Email: 
                        <td><input type="text" name="email">
                    </tr>

                    <tr>
                        <td>Telefon: 
                        <td><input type="text" name="telefon">
                    </tr>
                    <tr>
                        <td>Ulica: 
                        <td><input type="text" name="ulica">
                    </tr>
                    <tr>
                        <td>Nr. domu: 
                        <td><input type="text" name="nrDomu">
                    </tr>

                    <tr>
                        <td>Kod pocztowy: 
                        <td><input type="text" name="kodPocztowy">
                    </tr>

                    <tr>
                        <td>Miasto: 
                        <td><input type="text" name="miasto">
                    </tr>

                    <tr>
                        <td>NIP: 
                        <td><input type="text" name="nip">
                    </tr>

                    <tr>
                        <td>Nazwa firmy: 
                        <td><input type="text" name="nazwaFirmy">
                    </tr>

                    <tr>
                        <td>Nazwa banku: 
                        <td><input type="text" name="nazwaBanku">
                    </tr>

                    <tr>
                        <td><td><br><input type="submit" value="Zarejestruj" name="zarejestruj">
                    </tr>
                    </table>
                </center> -->
            </form>
        </body>
    </html> 
<?php
    zamknijPoloczenie();
?>