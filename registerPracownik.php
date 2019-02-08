<?php
include 'topPage.php';

if(($_SESSION['logged']==true)&&(($_SESSION['typUsera']==0)||($_SESSION['typUsera']==2))){
    echo '<br> <div class="alert alert-danger" role="alert">
        <center>Nie masz odpowiednich uprawnień!</center>
        </div>';
    include 'bottomPage.php';
    exit();
}

otworzPoloczenie();
?>



<?php   
    // jeśli zostanie naciśnięty przycisk "Zarejestruj"
    if(isset($_POST['login'])) {
        //pobieramy dane z pól
        $email = $_POST['email'] ?? '';
        $haslo = $_POST['haslo'] ?? '';
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        $login = $_POST['login'] ?? '';
        $imie = $_POST['imie'] ?? '';
        $nazwisko = $_POST['nazwisko'] ?? '';
        if($password != $password2) {
            echo '<div class="alert alert-danger" role="alert">
            <center>Podane hasła różnią się od siebie.</center>
            </div>';
        } else {
            // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
            $sql="SELECT Count(idPracownika) FROM Pracownicy WHERE login = '$login'";
            $result = mysqli_query($polaczenie, $sql);
            $row = mysqli_fetch_row($result);
            if($row[0] > 0) {
                echo '<div class="alert alert-danger" role="alert">
                <center>Już istnieje użytkownik z takim loginem.</center>
                </div>';
            } else {
                // jeśli nie istnieje to kodujemy haslo...
                $password = hashHaslo($_POST['password']);
                // i wykonujemy zapytanie na dodanie usera
                $sql="INSERT INTO Pracownicy (login, haslo, imie, nazwisko, email, typUzytkownika)
                    VALUES ('$login', '$password', '$imie', '$nazwisko', '$email', 1)";
                mysqli_query($polaczenie, $sql);
                //echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginPracownik.php">zalogować</a>.</p>';
                echo '<div class="alert alert-success" role="alert">
                        <center>Pracownik został poprawnie dodany</center></a>.
                     </div>';
            }
        }
    }  
?>

<section class="page">
    <div class="container">
        <form method="post" action="registerPracownik.php">
        <div class="container">
            <div class="row featurette">

                <div class="col-md-4 offset-md-2">
                    <h3>Dane konta:</h3><br>

                    <label class="w3-text-green"><b>Login:</b></label>
                    <input type="text" class="form-control" name="login" placeholder="pole wymagane"
                    required data-validation>

                    <label class="w3-text-green"><b>Hasło:</b></label>
                    <input type="password" class="form-control" name="password" placeholder="pole wymagane"
                    required data-validation>

                    <label class="w3-text-green"><b>Powtórz hasło:</b></label>
                    <input type="password" class="form-control" name="password2" placeholder="pole wymagane"
                    required data-validation>
                    <br>
                </div>
                <div class="col-md-4">
                    <h3>Dane adresowe:</h3><br>

                    <label class="w3-text-green"><b>Imię:</b></label>
                    <input type="text" class="form-control" name="imie" placeholder="pole wymagane"
                    required data-validation>

                    <label class="w3-text-green"><b>Nazwisko:</b></label>
                    <input type="text" class="form-control" name="nazwisko" placeholder="pole wymagane"
                    required data-validation>

                    <label class="w3-text-green"><b>Adres E-mail:</b></label>
                    <input type="text" class="form-control" name="email">
                    
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <center>
                    <input href="panelPracownika.php" class="w3-btn w3-green" type="submit" value="Zarejestruj" name="zarejestruj">
                </center>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>  
<?php
    include 'bottomPage.php';
    zamknijPoloczenie();   
?>