<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<div class="container">
    <div class="row featurette">

        <div class="col-md-2">
            <button class="btn btn-light" type="submit">Nowe Zlecenie</button>
            <button class="btn btn-light" type="submit">Wszystkie Zlecenia</button>
            <button class="btn btn-light" type="submit">Moje dane</button>
        </div>

        <form class="col-md-10" method="post" action="wycena.php" >
            <div class="row featurette">

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="w3-text-green"><b>Marka:</b></label>
                        <input type="text" class="form-control" name="marka" placeholder="Marka pojazdu">
                    </div>
                    <div class="form-group">
                        <label class="w3-text-green"><b>Model:</b></label>
                        <input type="text" class="form-control" name="model" placeholder="Model pojazdu">
                    </div>
                    <div class="form-group">
                        <label class="w3-text-green"><b>Opis usterki:</b></label>
                        <textarea class="form-control" name="opisUsterki" 
                        placeholder="Tutaj szczegółowo usterkę pojazdu, na jej podstawie, oszacujemy koszt naprawy" rows="8"></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="w3-text-green"><b>Opis zlecenia:</b></label>
                        <textarea class="form-control" name="opisZlecenia" 
                        placeholder="Tutaj opisz na czym ma polgać zlecenie" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="w3-text-green"><b>Data przekazania pojazdu:</b></label>
                        <input type="date" name="dataPrzekazaniaPojazdu" max="3000-12-31" 
                                min="2019-01-01" class="form-control">    
                    </div>
                </div>

            </div>

            <div class="row featurette">
                <div class="col-md-10">
                    <label class="w3-text-green"><b>Tutaj możesz dołączyć zdjęcie lub inny dokument dotyczący zlecenia:</b></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="zdjecieUszkodzenia">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="w3-btn w3-green"name="zapisz">Zapisz</button>
                </div>
            </div>
            
        </form>


    </div>
</div>

<?php   
    $idKlienta =$_SESSION['idKlienta'] ?? '';

    if(isset($_POST['zapisz'])&&(isset($_SESSION['logged'])) && ($_SESSION['logged']==true)) {
        //pobieramy dane z pól
        $marka = $_POST['marka'] ?? '';
        $model = $_POST['model'] ?? '';
        $opisUsterki = $_POST['opisUsterki'] ?? '';
        $opisZlecenia = $_POST['opisZlecenia'] ?? '';
        $dataPrzekazaniaPojazdu = $_POST['dataPrzekazaniaPojazdu'] ?? '';
        // sprawdzamy czy wszystkie pola zostały wypełnione
        if(empty($marka) || empty($model) || empty($opisUsterki) || empty($opisZlecenia) || empty($dataPrzekazaniaPojazdu)) {
            echo '<p><center>Musisz wypełnić wszystkie obowiązkowe pola</center>.</p>';
        } else{
                $sql="INSERT INTO Zlecenia (dataDodania, idKlienta, idPracownika, 
                        opisZlecenia, statusZlecenia, wartoscZlecenia)
                        VALUES (now(), $idKlienta, 1, '$opisZlecenia', 1, 0)";
                mysqli_query($polaczenie, $sql);
                
                echo '<p><center>Zlecenie zostało dodane</center></p>';
                //zamknijPoloczenie();
        }
    }
?>

<?php
    include 'bottomPage.php';
    
?>  