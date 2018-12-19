<?php
session_start();
include 'config.php';
otworzPoloczenie();
 
// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged']) {
    // jeśli zostanie naciśnięty przycisk "Zaloguj"
    if(isset($_POST['name'])) {
        // filtrujemy dane...
        $_POST['name'] = $_POST['name'];
        //$_POST['password'] = $_POST['password'];
        $_POST['password'] = hashHaslo($_POST['password']);
        $sql="SELECT idKlienta FROM Klienci WHERE login = '{$_POST['name']}' AND haslo = '{$_POST['password']}' LIMIT 1";
        // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
        $result = mysqli_query($polaczenie, $sql);
        if(mysqli_num_rows($result) > 0) {
            // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "user_id" wstawiamy id usera
            $row = mysqli_fetch_assoc($result);
            $_SESSION['logged'] = true;
            $_SESSION['idKlienta'] = $row['idKlienta'];
            header('Location: index.html');
        } else {
            echo '<p>Podany login i/lub hasło jest nieprawidłowe.</p>';
        }
    }
 
    // wyświetlamy komunikat na zalogowanie się
    echo '<form method="post" action="loginKlient.php">
    <center>
        <p>
            Login:<br>
            <input type="text" value="'.$_POST['name'].'" name="name">
        </p>
        <p>
            Hasło:<br>
            <input type="password" value="'.$_POST['password'].'" name="password">
        </p>
        <p>
            <input type="submit" value="Zaloguj">
        </p>
        <br>
        <p> [<a href="register.php">Nie posiadasz konta? Zarejestruj się!</a>]</p>
        </center>
    </form>';
} else {
        echo '<p>Jesteś już zalogowany.</p>
        <p>[<a href="index.html">Powrót</a>]</p>';
    }

zamknijPoloczenie();
?>