<?php
    include 'config.php';
    otworzPoloczenie();
    
    // sprawdzamy czy user nie jest przypadkiem zalogowany
    if(!($_SESSION['logged'] ?? '')) {
        // jeśli zostanie naciśnięty przycisk "Zarejestruj"
        if(isset($_POST['login'])) {
            //pobieramy dane
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
             //dane adresowe
            $ulica = $_POST['ulica'];
            $nrDomu = $_POST['nrDomu'];
            $kodPocztowy = $_POST['kodPocztowy'];
            $miasto = $_POST['miasto'];
            //dane firmy
            $nip = $_POST['nip'];
            $nazwaFirmy = $_POST['nazwaFirmy'];
            $nazwaBanku = $_POST['nazwaBanku'];
            $kontoBankowe = $_POST['kontoBankowe'];
            
    
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
                    $_POST['password'] = hashHaslo($_POST['password']);
                    // i wykonujemy zapytanie na dodanie usera
                    $sql="INSERT INTO Klienci (login, haslo) VALUES ('$login', '{$password}')";
                    mysqli_query($polaczenie, $sql);
                    echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginKlient.php">zalogować</a>.</p>';
                }
            }
        }
    
        // wyświetlamy formularz
        echo '<form method="post" action="register.php">
            <p>
                Login:<br>
                <input type="text" value="'.$login.'" name="login" >
            </p>

            <p>
                Hasło:<br>
                <input type="password" value="'.$password.'" name="password">
            </p>
            <p>
                Powtórz hasło:<br>
                <input type="password" value="'.$password2.'" name="password2">
            </p>


            <p>
                Imie:<br>
                <input type="text" value="'.$imie.'" name="imie">
            </p>
            <p>
                Nazwisko:<br>
                <input type="text" value="'.$nazwisko.'" name="nazwisko">
            </p>
            <p>
                Email:<br>
                <input type="text" value="'.$email.'" name="email">
            </p>
            <p>
                Telefon:<br>
                <input type="text" value="'.$telefon.'" name="telefon">
            </p>
            <p>
                Nowe:<br>
                <input type="text" value="'.$nowe.'" name="nowe">
            </p>
            <p>
                Nowe:<br>
                <input type="text" value="'.$nowe.'" name="nowe">
            </p>
            <p>
                Nowe:<br>
                <input type="text" value="'.$nowe.'" name="nowe">
            </p>


            <p>
                <input type="submit" value="Zarejestruj" name="zarejestruj">
            </p>
        </form>';
    } else {
        echo '<p>Jesteś już zalogowany, więc nie możesz stworzyć nowego konta.</p>
            <p>[<a href="index.html">Powrót</a>]</p>';
    }
    
    zamknijPoloczenie();
?>