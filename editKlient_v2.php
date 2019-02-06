<?php
    include 'topPage.php';
    otworzPoloczenie();

?>

<?php

        $idKlienta=$_SESSION['idKlienta'] ?? '';

        $select="select imie, nazwisko, email, telefon, nrDomu, kodPocztowy,ulica, miasto, nazwaFirmy, nip FROM Klienci where idKlienta=$idKlienta";
        $result=mysqli_query($polaczenie, $select);     
        $query=mysqli_fetch_array($result);

        if(isset($_POST['submit']))
        {
        //pobieramy dane z pól
        $imie=$_POST['imie'] ?? '';
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        $nazwisko=$_POST['firstname'] ?? '';
        $email=$_POST['email'] ?? '';
        $telefon=$_POST['telefon'] ?? '';
        $kodPocztowy=$_POST['kodPocztowy'] ?? '';
        $miasto=$_POST['miasto'] ?? '';
        $ulica=$_POST['ulica'] ?? '';
        $nrDomu=$_POST['nrDomu'] ?? '';
        $nazwaFirmy=$_POST['nazwaFirmy'] ?? '';
        $nip=$_POST['nip'] ?? '';

        
        if($password != $password2){
            echo '<p>Podane hasła różnią się od siebie.</p>';
        } else {
                $password = hashHaslo($_POST['password']);
                // i wykonujemy zapytanie na edycje usera
                $sql="UPDATE Klienci set imie='$imie',haslo='$password',nazwisko='$nazwisko',email='$email',telefon='$telefon'
                    ,nrDomu='$nrDomu',kodPocztowy='$kodPocztowy', ulica='$ulica',miasto='$miasto',nazwaFirmy='$nazwaFirmy',nip='$nip'
                    where idKlienta=$idKlienta";
                mysqli_query($polaczenie, $sql);
        }
    }
        
?>

<section class="page">
    <div class="container">
        <form method="post" action="editKlient_v2.php">
            <div class="container">
                <div class="row featurette">

                    <div class="col-md-4">
                        <h3>Dane konta:</h3><br>

                        <label class="w3-text-green"><b>Hasło:</b></label>
                        <input type="password" class="form-control" name="password" placeholder="pole wymagane">

                        <label class="w3-text-green"><b>Powtórz hasło:</b></label>
                        <input type="password" class="form-control" name="password2" placeholder="pole wymagane">
                        <br>
                    </div>
                    <div class="col-md-4">
                        <h3>Dane adresowe:</h3><br>

                        <label class="w3-text-green"><b>Imię:</b></label>
                        <input type="text" class="form-control" name="imie"
                        value="<?php echo $query['imie']; ?>" required data-validation>

                        <label class="w3-text-green"><b>Nazwisko:</b></label>
                        <input type="text" class="form-control" name="nazwisko"
                        value="<?php echo $query['nazwisko']; ?>" required data-validation>

                        <label class="w3-text-green"><b>Adres E-mail:</b></label>
                        <input type="text" class="form-control" name="email"
                        value="<?php echo $query['email']; ?>" required data-validation>

                        <label class="w3-text-green"><b>Telefon:</b></label>
                        <input type="text" class="form-control" name="telefon"
                        value="<?php echo $query['telefon']; ?>" required data-validation>
                        
                        <label class="w3-text-green"><b>Numer domu:</b></label>
                        <input type="text" class="form-control" name="nrDomu"
                        value="<?php echo $query['nrDomu']; ?>" required data-validation>
                        
                        <label class="w3-text-green"><b>Kod pocztowy:</b></label>
                        <input type="text" class="form-control" name="kodPocztowy"
                        value="<?php echo $query['kodPocztowy']; ?>" required data-validation>
                        
                        <label class="w3-text-green"><b>Ulica:</b></label>
                        <input type="text" class="form-control" name="ulica"
                        value="<?php echo $query['ulica']; ?>" required data-validation>

                        <label class="w3-text-green"><b>Miasto:</b></label>
                        <input type="text" class="form-control" name="miasto"
                        value="<?php echo $query['miasto']; ?>" required data-validation>
                        
                    </div>
                    <div class="col-md-4">
                        <h3>Dane firmy:</h3><br>
                        
                        <label class="w3-text-green"><b>Nazwa firmy:</b></label>
                        <input type="text" class="form-control" name="nazwaFirmy"
                        value="<?php echo $query['nazwaFirmy']; ?>" required data-validation>

                        <label class="w3-text-green"><b>NIP:</b></label>
                        <input type="text" class="form-control" name="nip"
                        value="<?php echo $query['nip']; ?>" required data-validation>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    <center>
                        <input class="w3-btn w3-green" type="submit" value="submit" name="submit">
                    </center>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>  
<?php
    include 'bottomPage.php';
?>