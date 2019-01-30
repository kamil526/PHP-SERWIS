<?php
    session_start();
    include 'config.php';
    otworzPoloczenie();

    //jezeli uzytkownik jest zalogowany, przekieruj go na index.php
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
        header('Location: index.php');
        //nie wykonuj kodu poniżej
		exit();
	}else{
            // jeśli nie ma jeszcze sesji "logged" i "idKlienta" to wypełniamy je domyślnymi danymi
            $_SESSION['logged'] = false;
            $_SESSION['idKlienta'] = -1;
        }
?>
      
<!doctype html>
<html lang="pl">
    <head>
        <title>eSerwis - Logowanie Klienta </title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="startpage/css/styles.css">
        <link rel="stylesheet" href="startpage/css/bootstrap.css">
    </head>
    <body>
    <section class="page">
        <div class="container">
            <div class="row featurette">
                
                <div class="col-md-4 offset-md-4">
                    <form method="post" action="loginKlient.php">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" name="login" aria-describedby="emailHelp" placeholder="login">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hasło</label>
                            <input type="password" class="form-control" name="password" placeholder="hasło">
                        </div>
                        <button type="submit" class="btn btn-primary">Zaloguj się</button>
                        <p> 
                            [<a href="register.php">Nie posiadasz konta? Zarejestruj się!</a>]
                        </p>
                    </form>
                </div>
             
                
            </div>
        </div>
    </section>
    </body>
</html>

<?php
    // jeśli zostanie naciśnięty przycisk "Zaloguj"
    if(isset($_POST['login'])) {
        // filtrujemy dane...
        $login = $_POST['login'] ?? '';
        //$_POST['password'] = $_POST['password'];
        $password = hashHaslo($_POST['password']) ?? '';
        $sql="SELECT idKlienta FROM Klienci WHERE login = '$login' AND haslo = '$password' LIMIT 1";
        // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
        $result = mysqli_query($polaczenie, $sql);
        if(mysqli_num_rows($result) > 0) {
            // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "idKlienta" wstawiamy idKlienta
            $row = mysqli_fetch_assoc($result);
            $_SESSION['logged'] = true;
            $_SESSION['idKlienta'] = $row['idKlienta'];
            $_SESSION['login'] = $_POST['login'];
            header('Location: index.php');
        } else {
                echo '<p>Podany login i/lub hasło jest nieprawidłowe.</p>';
            }
    }

    zamknijPoloczenie();
?>