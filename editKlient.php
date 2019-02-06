<?php
    include 'topPage.php';
    otworzPoloczenie();
?>
    <?php
    
            $idKlienta=$_SESSION['idKlienta'] ?? '';
            $imie=$_POST['imie'] ?? '';
            $nazwisko=$_POST['firstname'] ?? '';
            $email=$_POST['email'] ?? '';
            $telefon=$_POST['telefon'] ?? '';
            $kodPocztowy=$_POST['kodPocztowy'] ?? '';
            $miasto=$_POST['miasto'] ?? '';
            $nrDomu=$_POST['nrDomu'] ?? '';
            $nazwaFirmy=$_POST['nazwaFirmy'] ?? '';
            $nip=$_POST['nip'] ?? '';
            $nrDomu=$_POST['nrDomu'] ?? '';
            
            $sqlUpdate="UPDATE Klienci set imie='$imie',nazwisko='$nazwisko',email='$email',telefon='$telefon'
            ,nrDomu='$nrDomu',kodPocztowy='$kodPocztowy',miasto='$miasto',nazwaFirmy='$nazwaFirmy',nip='$nip'
            where idKlienta=$idKlienta";

            //$query3
            $select="select imie, nazwisko, email, telefon, nrDomu, kodPocztowy, miasto, nazwaFirmy, nip FROM Klienci where idKlienta=$idKlienta";
            $result=mysqli_query($polaczenie, $select);     
            $query=mysqli_fetch_array($result);
    
    ?>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" 
                                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <form method="post" action="menuKlient.php">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="w3-text-green" ><b>Login:</b></label>
                                    <input type="text" class="form-control" name="password"
                                    value="<?php echo $_SESSION['login']?>" readonly>
                                </div>
                                <!--
                                <div class="col-md-4">
                                    <label class="w3-text-green" ><b>Hasło:</b></label>
                                    <input type="password" class="form-control" name="password" placeholder="hasło"
                                    required data-validation>
                                </div>
                                <div class="col-md-4">
                                    <label class="w3-text-green" ><b>Powtórz hasło:</b></label>
                                    <input type="password" class="form-control" name="password2" placeholder="hasło"
                                    required data-validation>
                                </div>
-->
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
                                    value="<?php echo $query['nazwaFirmy']; ?>" required data-validation>
                                </div>
                                <div class="col-md-4">
                                    <label class="w3-text-green" ><b>NIP:</b></label>
                                    <input type="text" class="form-control" name="nip"
                                    value="<?php echo $query['nip']; ?>" required data-validation>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="w3-btn" data-dismiss="modal">Close</button>
                            <input type="submit" class="w3-btn w3-green" value="Zapisz" name="zapisz">
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>

    <?php
    include 'bottomPage.php';  
   // zamknijPoloczenie();
?>