
<?php

if ($_SESSION['logged']==false){
    header('Location: loginKlient.php');
    //nie wykonuj kodu poniżej
    exit();
}
if(($_SESSION['logged']==true)&&(($_SESSION['typUsera']==0)||($_SESSION['typUsera']==1))){
    echo '<br> <div class="alert alert-danger" role="alert">
        <center>Nie masz odpowiednich uprawnień!</center>
        </div>';
    include 'bottomPage.php';
    exit();
}

?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <?php
        if(isset($_POST['zapiszKlient'])){
            //pobieramy dane z pól
            $imie=$_POST['imie'] ?? '';
            $password = $_POST['password'] ?? '';
            $password2 = $_POST['password2'] ?? '';
            $nazwisko=$_POST['nazwisko'] ?? '';
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

        $idKlienta=$_SESSION['idKlienta'] ?? '';

        $select="select imie, nazwisko, email, telefon, nrDomu, kodPocztowy, ulica, miasto, nazwaFirmy, nip FROM Klienci where idKlienta=$idKlienta";
        $result=mysqli_query($polaczenie, $select);     
        $query=mysqli_fetch_array($result);
    ?>

    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edycja danych</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Zawartosc modala -->
                <form method="post" action="panelKlienta.php" id="modal-form">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Login:</b></label>
                                <input type="text" class="form-control" name="password"
                                value="<?php echo $_SESSION['login']?>" readonly>
                            </div>
                        
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Hasło:</b></label>
                                <input type="password" class="form-control" name="password"
                                required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Powtórz hasło:</b></label>
                                <input type="password" class="form-control" name="password2"
                                required data-validation>
                            </div>
                    
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Imię:</b></label>
                                <input type="text" class="form-control" name="imie"
                                value="<?php echo $query['imie']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Nazwisko:</b></label>
                                <input type="text" class="form-control" name="nazwisko"
                                value="<?php echo $query['nazwisko']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>E-mail:</b></label>
                                <input type="text" class="form-control" name="email"
                                value="<?php echo $query['email']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Telefon:</b></label>
                                <input type="text" class="form-control" name="telefon"
                                value="<?php echo $query['telefon']; ?>"required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Nr domu:</b></label>
                                <input type="text" class="form-control" name="nrDomu"
                                value="<?php echo $query['nrDomu']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Kod pocztowy:</b></label>
                                <input type="text" class="form-control" name="kodPocztowy"
                                value="<?php echo $query['kodPocztowy']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Ulica:</b></label>
                                <input type="text" class="form-control" name="ulica"
                                value="<?php echo $query['ulica']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Miasto:</b></label>
                                <input type="text" class="form-control" name="miasto"
                                value="<?php echo $query['miasto']; ?>" required data-validation>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Nazwa firmy:</b></label>
                                <input type="text" class="form-control" name="nazwaFirmy"
                                value="<?php echo $query['nazwaFirmy']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>NIP:</b></label>
                                <input type="text" class="form-control" name="nip"
                                value="<?php echo $query['nip']; ?>">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="w3-btn w3-red" data-dismiss="modal">Anuluj</button>
                        <input class="w3-btn w3-green" type="submit" value="Zapisz" name="zapiszKlient" form="modal-form">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>