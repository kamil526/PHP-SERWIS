<?php
    include 'config.php';
    otworzPoloczenie();
    session_start();

    // jeśli nie ma jeszcze sesji "logged" i "idKlienta" to wypełniamy je domyślnymi danymi
    if(!isset($_SESSION['logged'])) {
        $_SESSION['logged'] = false;
        $_SESSION['idKlienta'] = -1;
    }
    
    // sprawdzamy czy user nie jest przypadkiem zalogowany
    if(!$_SESSION['logged']) {
        // jeśli zostanie naciśnięty przycisk "Zaloguj"
        if(isset($_POST['login'])) {
            // filtrujemy dane...
            $login = $_POST['login'];
            //$_POST['password'] = $_POST['password'];
            $password = hashHaslo($_POST['password']);
            $sql="SELECT idKlienta FROM Klienci WHERE login = '$login' AND haslo = '$password' LIMIT 1";
            // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
            $result = mysqli_query($polaczenie, $sql);
            if(mysqli_num_rows($result) > 0) {
                // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "idKlienta" wstawiamy idKlienta
                $row = mysqli_fetch_assoc($result);
                $_SESSION['logged'] = true;
                $_SESSION['idKlienta'] = $row['idKlienta'];
                $_SESSION['login'] = $_POST['login'];
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
                <input type="text" value="'.$login.'" name="login">
            </p>
            <p>
                Hasło:<br>
                <input type="password" value="'.$password.'" name="password">
            </p>
            <p>
                <input type="submit" value="Zaloguj">
            </p>
            <br>
            <p> [<a href="register.php">Nie posiadasz konta? Zarejestruj się!</a>]</p>
            </center>
        </form>';
    } else {
            echo 
            '<form method="POST" action="logout.php">
            
                <center>
                    <br>
                    <br>
                    <br>
                    <p><b>'.$_SESSION['login'].'</b>, Jesteś już zalogowany, więc nie możesz się zalogować ponownie.
                    </p>
                    <p>
                        [<a href="index.html">Powrót</a>]
                    </p>
                    <p>
                        <input type="submit" value="Wyloguj" name="wyloguj">
                    </p>
                </center>
            </form>';
        }
    zamknijPoloczenie();
?>