<?php
    include 'topPage.php';
    // gdyby zmienn sesyjnatyp usera nie była zainicjowana wstawiamy ''
    // wartość domyślna gdyby typUsera ni był zainnicjowany(rejestracja z poziomu Klienta)
    $loggedd = $_SESSION['typUsera'] ?? '';
    
    if (($_SESSION['logged']==true)&&($_SESSION['typUsera']==2)){
        header('Location: index.php');
        //nie wykonuj kodu poniżej
        exit();
    }
    
    otworzPoloczenie();
?>

<?php   
    if(isset($_POST['login'])) {
        //pobieramy dane z pól metoda POST
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        $imie = $_POST['imie'] ?? '';
        $nazwisko = $_POST['nazwisko'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefon = $_POST['telefon'] ?? '';
        //dane adresowe
        $ulica = $_POST['ulica'] ?? '';
        $nrDomu = $_POST['nrDomu'] ?? '';
        $kodPocztowy = $_POST['kodPocztowy'] ?? '';
        $miasto = $_POST['miasto'] ?? '';
        //dane firmy
        $nip = $_POST['nip'] ?? '';
        $nazwaFirmy = $_POST['nazwaFirmy'] ?? '';

        // sprawdzamy czy pola zostały wypełnione
        if(empty($login) || empty($password) || empty($password2)) {
            echo '<p>Musisz wypełnić wszystkie obowiązkowe pola.</p>';
        // sprawdzamy czy podane hasła są takie same
        } elseif($password != $password2) {
            echo  '<div class="alert alert-danger" role="alert">
                    <center>Podane hasła różnią się od siebie.</center>
                    </div>';
        } else {
            // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
            $sql="SELECT Count(idKlienta) FROM Klienci WHERE login = '$login'";
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
                $sql="INSERT INTO Klienci (login, haslo, imie, nazwisko, email, telefon, ulica
                                            , nrDomu, kodPocztowy, miasto, nip, nazwaFirmy)
                    VALUES ('$login', '$password', '$imie', '$nazwisko', '$email','$telefon', '$ulica'
                            , '$nrDomu', '$kodPocztowy', '$miasto', '$nip', '$nazwaFirmy')";
                mysqli_query($polaczenie, $sql);
                zamknijPoloczenie();
                // jeżeli rejestracja jest wywołana z Panelu Praconika
                if( ($_SESSION['logged']==true) && ($loggedd==0) || ($loggedd==1) ){
                    echo '<div class="alert alert-success" role="alert">
                    <center>Użytkownik został poprawnie dodany.</center>
                    </div>';
                }else{
                    // jeżeli rejestracja jest wywołana przez nowego usera 
                    echo '<div class="alert alert-success" role="alert">
                    <center>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginKlient.php" class="alert-link">zalogować</a>.</center>
                    </div>';
                }

            }
        }
    }  
?>

<section class="page">
    <div class="container">
        <form method="post" action="registerKlient.php">
            <div class="container">
                <div class="row featurette">

                    <div class="col-md-4">
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
                        <label for="mail" class="w3-text-green"><b>Adres E-mail:</b></label>
                        <input type="email" class="form-control" id="mail" name="email" placeholder="pole wymagane"
                            required data-validation>
                        <label class="w3-text-green"><b>Telefon:</b></label>
                        <input type="text" class="form-control" name="telefon">

                        <label class="w3-text-green"><b>Ulica:</b></label>
                        <input type="text" class="form-control" name="ulica">
                        
                        <label class="w3-text-green"><b>Numer domu:</b></label>
                        <input type="text" class="form-control" name="nrDomu">
                        
                        <label class="w3-text-green"><b>Kod pocztowy:</b></label>
                        <input type="text" class="form-control" name="kodPocztowy">
                        
                        <label class="w3-text-green"><b>Miasto:</b></label>
                        <input type="text" class="form-control" name="miasto">  
                    </div>
                    <div class="col-md-4">
                        <h3>Dane firmy:</h3><br>  
                        <label class="w3-text-green"><b>Nazwa firmy:</b></label>
                        <input type="text" class="form-control" name="nazwaFirmy">

                        <label class="w3-text-green"><b>NIP:</b></label>
                        <input type="text" class="form-control" name="nip">   
                    </div>
                </div>
                
                <?php 
                    // wygląd dla wywołąnia rejestracji z poziomu Panelu Pracownika
                    if( ($_SESSION['logged']==true) && ($loggedd==0) || ($loggedd==1) )
                    {
                        ?>
                            <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <center>
                                    <a href="panelPracownika.php" class="w3-btn w3-red">Anuluj</a>
                                    <input href="panelPracownika.php" class="w3-btn w3-green" type="submit" value="Zapisz" name="zarejestruj">
                                </center>
                                </div>
                            </div>
                        <?php 
                    } 
                    else {
                    // poniżej wygląd dla wywołania rejestracji przez nowego Klienta
                ?>

                <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Akceptuje<a href="regulamin.php"><b> regulamin </b></a>serwisu
                    </label>
                    <div class="invalid-feedback">
                        Musisz zaakceptować regulamin
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <center>
                        <input class="w3-btn w3-green" type="submit" value="Zarejestruj" name="zarejestruj">
                    </center>
                    </div>
                </div>

                <?php 
                    } 
                    
                ?>
            </div>
        </form>
    </div>
</section>  


<script>
    var email = document.getElementById("mail");

    email.addEventListener("input", function (event) {
    if (email.validity.typeMismatch) {
        email.setCustomValidity("Proszę podać poprawny E-Mail");
    } else {
        email.setCustomValidity("");
    }
    });
</script>

<?php
    include 'bottomPage.php';
?>