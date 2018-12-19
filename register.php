<?php
include 'config.php';
session_start();
otworzPoloczenie();
 
// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged']) {
    // jeśli zostanie naciśnięty przycisk "Zarejestruj"
    if(isset($_POST['name'])) {
        // filtrujemy dane...
        $_POST['name'] = $_POST['name'];
        $_POST['password'] = $_POST['password'];
        $_POST['password2'] = $_POST['password2'];
 
        // sprawdzamy czy wszystkie pola zostały wypełnione
        if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['password2'])) {
            echo '<p>Musisz wypełnić wszystkie pola.</p>';
        // sprawdzamy czy podane dwa hasła są takie same
        } elseif($_POST['password'] != $_POST['password2']) {
            echo '<p>Podane hasła różnią się od siebie.</p>';
        } else {
            // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
            $sql="SELECT Count(idKlienta) FROM Klienci WHERE login = '{$_POST['name']}'";
            $result = mysqli_query($polaczenie, $sql);
            $row = mysqli_fetch_row($result);
            if($row[0] > 0) {
                echo '<p>Już istnieje użytkownik z takim loginem.</p>';
            } else {
                // jeśli nie istnieje to kodujemy haslo...
                $_POST['password'] = hashHaslo($_POST['password']);
                // i wykonujemy zapytanie na dodanie usera
                $sql="INSERT INTO Klienci (login, haslo) VALUES ('{$_POST['name']}', '{$_POST['password']}')";
                mysqli_query($polaczenie, $sql);
                echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginKlient.php">zalogować</a>.</p>';
            }
        }
    }
 
    // wyświetlamy formularz
    echo '<form method="post" action="register.php">
        <p>
            Login:<br>
            <input type="text" value="'.$_POST['name'].'" name="name">
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
            <input type="submit" value="Zarejestruj">
        </p>
    </form>';
} else {
    echo '<p>Jesteś już zalogowany, więc nie możesz stworzyć nowego konta.</p>
        <p>[<a href="index.html">Powrót</a>]</p>';
}
 
zamknijPoloczenie();
?>