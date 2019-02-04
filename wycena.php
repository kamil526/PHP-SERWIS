<?php
    include 'topPage.php';
    otworzPoloczenie();
?>



<?php   
    // jeśli zostanie naciśnięty przycisk "Zapisz"
    if(isset($_POST['login'])) {
        //pobieramy dane z pól
        $marka = $_POST['marka'] ?? '';
        $model = $_POST['model'] ?? '';
        $opisUsterki = $_POST['opisUsterki'] ?? '';
        $opisZlecenia = $_POST['opisZlecenia'] ?? '';
        $dataPrzekazaniaPojazdu = $_POST['dataPrzekazaniaPojazdu'] ?? '';
        // sprawdzamy czy wszystkie pola zostały wypełnione
        if(empty($login) || empty($password) || empty($password2)) {
            echo '<p>Musisz wypełnić wszystkie obowiązkowe pola.</p>';
        // sprawdzamy czy podane dwa hasła są takie same
        } elseif($password != $password2) {
            echo '<p>Podane hasła różnią się od siebie.</p>';
        } else {
            // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
            $sql="SELECT Count(idKlienta) FROM Klienci WHERE login = '$login'";
            $result = mysqli_query($polaczenie, $sql);
            $row = mysqli_fetch_row($result);
            if($row[0] > 0) {
                echo '<p>Już istnieje użytkownik z takim loginem.</p>';
            } else {
                // jeśli nie istnieje to kodujemy haslo...
                $password = hashHaslo($_POST['password']);
                // i wykonujemy zapytanie na dodanie usera
                $sql="INSERT INTO Klienci (login, haslo, imie, nazwisko, email, telefon, ulica
                                            , nrDomu, kodPocztowy, miasto, nip, nazwaFirmy, nazwaBanku)
                    VALUES ('$login', '$password', '$imie', '$nazwisko', '$email','$telefon', '$ulica'
                            , '$nrDomu', '$kodPocztowy', '$miasto', '$nip', '$nazwaFirmy', '$nazwaBanku')";
                mysqli_query($polaczenie, $sql);
                
                echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="loginKlient.php">zalogować</a>.</p>';
                //zamknijPoloczenie();
            }
        }
    }  
?>


<div class="container">
    <div class="row featurette">

        <div class="col-md-2">
            <button class="btn btn-light" type="submit">Nowe Zlecenie</button>
            <button class="btn btn-light" type="submit">Wszystkie Zlecenia</button>
            <button class="btn btn-light" type="submit">Moje dane</button>
        </div>

        <div class="col-md-10" form>
            <div class="row featurette">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="inputAddress">Marka:</label>
                        <input type="text" class="form-control" name="marka" placeholder="Marka pojazdu">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Model:</label>
                        <input type="text" class="form-control" name="model" placeholder="Model pojazdu">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Opis usterki:</label>
                        <textarea class="form-control" name="opisUsterki" 
                        placeholder="Tutaj szczegółowo usterkę pojazdu, na jej podstawie, oszacujemy koszt naprawy" rows="8"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Opis zlecenia:</label>
                        <textarea class="form-control" name="opisZlecenia" 
                        placeholder="Tutaj opisz na czym ma polgać zlecenie" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Data przekazania pojazdu:</label>
                        <input type="date" name="dataPrzekazaniaPojazdu" max="3000-12-31" 
                                min="2019-01-01" class="form-control">    
                    </div>
                </div>

            </div>

            <div class="row featurette">
                <div class="col-md-10">
                    <label>Tutaj możesz dołączyć zdjęcie lub inny dokument dotyczący zlecenia:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="zdjecieUszkodzenia">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
            </div>
            
        </div>

    </div>
</div>

<?php
    include 'bottomPage.php';
    
?>  