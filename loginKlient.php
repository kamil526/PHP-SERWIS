<?php
    include 'topPage.php';
    
    //jezeli uzytkownik jest zalogowany, przekieruj go na panelKlienta.php
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
        header('Location: panelKlienta.php');
        //nie wykonuj kodu poniżej
		exit();
	}else{
            // jeśli nie ma jeszcze sesji "logged" i "idKlienta" to wypełniamy je domyślnymi danymi
            $_SESSION['logged'] = false;
            $_SESSION['idKlienta'] = -1;
            otworzPoloczenie();
        }
?>

<div class="container">
    <div class="row featurette">
        <div class="col-md-4 offset-md-4">   
            <form method="post" action="loginKlient.php"> 
                <div class="form-group">
                    <label class="w3-text-green"><b>Login</b></label>
                    <input type="text" class="form-control" name="login" placeholder="login"
                     required data-validation>
                </div>
                <div class="form-group">
                    <label class="w3-text-green"><b>Hasło</b></label>
                    <input type="password" class="form-control" name="password" placeholder="hasło"
                     required data-validation>
                </div>
                <button type="submit" class="w3-btn w3-green">Zaloguj się</button>
                <p> 
                    [<a href="registerKlient.php">Nie posiadasz konta? Zarejestruj się!</a>]
                </p>
            </form>
        
            <?php
                if(isset($_POST['login'])) {
                    $login = $_POST['login'] ?? '';
                    $password = hashHaslo($_POST['password']) ?? '';
                    $sql="SELECT idKlienta FROM Klienci WHERE login = '$login' AND haslo = '$password' LIMIT 1";
                    $result = mysqli_query($polaczenie, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['logged'] = true;
                        $_SESSION['idKlienta'] = $row['idKlienta'];
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['typUsera'] = 2;
                        zamknijPoloczenie();
                        header('Location: panelKlienta.php');
                    } else {
                            echo '<br> <div class="alert alert-danger" role="alert">
                                    Hasło lub login jest niepoprawne!
                                </div>';
                        }
                }

            ?>
        </div>
    </div>
</div>

<?php
    include 'bottomPage.php';  
?>