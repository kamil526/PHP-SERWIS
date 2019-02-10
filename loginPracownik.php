<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<?php
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
        header('Location: panelPracownika.php');
		exit();
	}else{
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
                if(isset($_POST['login'])) {
                    $login = $_POST['login'] ?? '';    
                    $password = hashHaslo($_POST['password']) ?? '';
                    $sql="SELECT * FROM Pracownicy WHERE login = '$login' AND haslo = '$password' LIMIT 1";
                    $result = mysqli_query($polaczenie, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['logged'] = true;
                        $_SESSION['idPracownika'] = $row['idPracownika'];
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['typUsera'] = $row['typUzytkownika'];
                        header('Location: panelPracownika.php');
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