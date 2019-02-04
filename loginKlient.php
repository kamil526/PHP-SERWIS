<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<?php
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

<?php
    include 'bottomPage.php';  
    zamknijPoloczenie();
?>