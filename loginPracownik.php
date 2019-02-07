<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<?php
    //jezeli uzytkownik jest zalogowany, przekieruj go na index.php
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
        header('Location: panelPracownika.php');
        //nie wykonuj kodu poniżej
		exit();
	}else{
            // jeśli nie ma jeszcze sesji "logged" i "idPracownika" to wypełniamy je domyślnymi danymi
            $_SESSION['logged'] = false;
            $_SESSION['idPracownika'] = -1;
        }
?>

<div class="container">
    <div class="row featurette">
        <div class="col-md-4 offset-md-4">
            <form method="post" action="loginPracownik.php">
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input type="text" class="form-control" name="login" placeholder="login"
                     required data-validation>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Hasło</label>
                    <input type="password" class="form-control" name="password" placeholder="hasło"
                     required data-validation>
                </div>

                <button type="submit" class="w3-btn w3-green">Zaloguj się</button>
                <br> 
                <br>
                <br>
            </form>
      
            <?php
                // jeśli zostanie naciśnięty przycisk "Zaloguj"
                if(isset($_POST['login'])) {
                    // filtrujemy dane...
                    $login = $_POST['login'] ?? '';
                    //$_POST['password'] = $_POST['password'];
                    $password = hashHaslo($_POST['password']) ?? '';
                    $sql="SELECT idPracownika FROM Pracownicy WHERE login = '$login' AND haslo = '$password' LIMIT 1";
                    // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
                    $result = mysqli_query($polaczenie, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "idPracownika" wstawiamy idPracownika
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['logged'] = true;
                        $_SESSION['idPracownika'] = $row['idPracownika'];
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['typUsera'] = 0;
                        header('Location: panelPracownika.php');
                    } else {
                            echo '<br> <div class="alert alert-danger" role="alert">
                                    Hasło lub login jest niepoprawne!
                                </div>';
                        }
                }

                //zamknijPoloczenie();
            ?>
        </div>
    </div>
</div>

<?php
    include 'bottomPage.php';  
   // zamknijPoloczenie();
?>