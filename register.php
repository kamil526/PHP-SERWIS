<?php
    include 'config.php';
    otworzPoloczenie();
    
    // sprawdzamy czy user nie jest przypadkiem zalogowany
    if(!($_SESSION['logged'] ?? '')) {
        // jeśli zostanie naciśnięty przycisk "Zarejestruj"
        if(isset($_POST['login'])) {
            //pobieramy dane
            $_POST['login'] = $_POST['login'] ?? '';
            $_POST['password'] = $_POST['password'];
            $_POST['password2'] = $_POST['password2'];
            $_POST['imie'] = $_POST['imie'];
            $_POST['nazwisko'] = $_POST['nazwisko'];
            $_POST['email'] = $_POST['email'];
            $_POST['telefon'] = $_POST['telefon'];
             //dane adresowe
            $_POST['ulica'] = $_POST['ulica'];
            $_POST['nrDomu'] = $_POST['nrDomu'];
            $_POST['kodPocztowy'] = $_POST['kodPocztowy'];
            $_POST['miasto'] = $_POST['miasto'];
            //dane firmy
            $_POST['nip'] = $_POST['nip'];
            $_POST['nazwaFirmy'] = $_POST['nazwaFirmy'];
            $_POST['nazwaBanku'] = $_POST['nazwaBanku'];
            $_POST['kontoBankowe'] = $_POST['kontoBankowe'];
            
    
            // sprawdzamy czy wszystkie pola zostały wypełnione
            if(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password2'])) {
                echo '<p>Musisz wypełnić wszystkie obowiązkowe pola.</p>';
            // sprawdzamy czy podane dwa hasła są takie same
            } elseif($_POST['password'] != $_POST['password2']) {
                echo '<p>Podane hasła różnią się od siebie.</p>';
            } else {
                // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
                $sql="SELECT Count(idKlienta) FROM Klienci WHERE login = '{$_POST['login']}'";
                $result = mysqli_query($polaczenie, $sql);
                $row = mysqli_fetch_row($result);
                if($row[0] > 0) {
                    echo '<p>Już istnieje użytkownik z takim loginem.</p>';
                } else {
                    // jeśli nie istnieje to kodujemy haslo...
                    $_POST['password'] = hashHaslo($_POST['password']);
                    // i wykonujemy zapytanie na dodanie usera
                    $sql="INSERT INTO Klienci (login, haslo) VALUES ('{$_POST['login']}', '{$_POST['password']}')";
                    mysqli_query($polaczenie, $sql);
                    echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginKlient.php">zalogować</a>.</p>';
                }
            }
        }
    
        // wyświetlamy formularz
        echo '<form method="post" action="register.php">
            <p>
                Login:<br>
                <input type="text" value="'.$_POST['login'].'" name="login">
            </p>
            <p>
                Hasło:<br>
                <input type="password" value="'.$_POST['password'].'" name="password">
            </p>
            <p>
                Powtórz hasło:<br>
                <input type="password" value="'.$_POST['password2'].'" name="password2">
            </p>





            <p>
                Imie:<br>
                <input type="text" value="'.$_POST['imie'].'" name="imie">
            </p>
            <p>
                Nazwisko:<br>
                <input type="text" value="'.$_POST['nazwisko'].'" name="nazwisko">
            </p>
            <p>
                Email:<br>
                <input type="text" value="'.$_POST['email'].'" name="email">
            </p>
            <p>
                Telefon:<br>
                <input type="text" value="'.$_POST['telefon'].'" name="telefon">
            </p>
            <p>
                Nowe:<br>
                <input type="text" value="'.$_POST['nowe'].'" name="nowe">
            </p>
            <p>
                Nowe:<br>
                <input type="text" value="'.$_POST['nowe'].'" name="nowe">
            </p>
            <p>
                Nowe:<br>
                <input type="text" value="'.$_POST['nowe'].'" name="nowe">
            </p>


            <p>
                <input type="submit" value="Zarejestruj">
            </p>
        </form>';
    } else {
        echo '<p>Jesteś już zalogowany, więc nie możesz stworzyć nowego konta.</p>
            <p>[<a href="index.html">Powrót</a>]</p>';
    }
    
    zamknijPoloczenie();
?>