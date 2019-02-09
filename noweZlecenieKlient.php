<?php
    include 'topPage.php';
    
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

    otworzPoloczenie();
?>




<?php   
    $idKlienta =$_SESSION['idKlienta'] ?? '';

    if(isset($_POST['zapisz'])&&(isset($_SESSION['logged'])) && ($_SESSION['logged']==true)) {
        //pobieramy dane z pól
        $markaPojazdu = $_POST['markaPojazdu'] ?? '';
        $modelPojazdu = $_POST['modelPojazdu'] ?? '';
        $opisUsterki = $_POST['opisUsterki'] ?? '';
        $opisZlecenia = $_POST['opisZlecenia'] ?? '';
        $dataPrzekazania = $_POST['dataPrzekazania'] ?? '';
        // sprawdzamy czy wszystkie pola zostały wypełnione
        if(empty($markaPojazdu) || empty($modelPojazdu) || empty($dataPrzekazania)) {
            echo '<p><center>Musisz wypełnić wszystkie obowiązkowe pola</center>.</p>';
        } else{
                $sql="INSERT INTO Zlecenia (idPracownika, idKlienta, dataDodania, dataPrzekazania, dataZakonczenia, statusZlecenia, rodzajZlecenia, opisZlecenia, opisUsterki, komentarzPracownika, markaPojazdu, modelPojazdu, wartoscZlecenia)
                VALUES (1, '$idKlienta',now(), '$dataPrzekazania', NULL, 'Oczekuje', ' ','$opisZlecenia','$opisUsterki',' ','$markaPojazdu','$modelPojazdu',0)";
                //mysqli_query($polaczenie, $sql);

                if (mysqli_query($polaczenie, $sql)) {
                //echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
                }   
                
                echo '<div class="alert alert-success" role="alert">
                        <center>Zlecenie zostało dodane</center>
                     </div>';
        }
        include 'upload.php';
    }
?>

<div class="container">
    <h1 class="w3-green" style="padding:10px;">Nowe Zlecenie</h1>
    <div class="row featurette">
    
        <div class="col-md-2">
            <form>
                <input type="button" value="Nowe Zlecenie" onclick="window.location.href='noweZlecenieKlient.php'" 
                class="w3-btn w3-green" style="width:100%" />
            </form>
            <br>
            <form>
                <input type="button" value="Moje Zlecenia" onclick="window.location.href='zleceniaKlient.php'" 
                class="w3-btn w3-green" style="width:100%" />
            </form>
            <br>
            <button type="button" class="w3-btn w3-green" style="width:100%" data-toggle="modal" data-target=".bd-example-modal-lg">Moje dane</button>
            <br>
            <br>
        </div>

        <form class="col-md-10" method="post" action="noweZlecenieKlient.php" enctype="multipart/form-data" >
            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="w3-text-green"><b>Marka:</b></label>
                        <input type="text" class="form-control" name="markaPojazdu" placeholder="Marka pojazdu"
                        required data-validation>
                    </div>
                    <div class="form-group">
                        <label class="w3-text-green"><b>Model:</b></label>
                        <input type="text" class="form-control" name="modelPojazdu" placeholder="Model pojazdu"
                        required data-validation>
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
                        <textarea class="form-control" name="opisZlecenia" placeholder="Tutaj opisz na czym ma polegać zlecenie" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="w3-text-green"><b>Data przekazania pojazdu:</b></label>
                        <input type="date" name="dataPrzekazania" value="<?php echo date('Y-m-d');?>" class="form-control" 
                            min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"    required data-validation>    
                    </div>
                </div>

            </div>

            <div class="row featurette">
                <div class="col-md-10">
                    <label class="w3-text-green"><b>Tutaj dołącz zdjęcie w formacie .jpg:</b></label>
                    <div class="custom-file">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div> 
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-12">
                    <button type="submit" class="w3-btn w3-green" name="zapisz">Zapisz</button>
                </div>
            </div>
            
        </form>
    </div>
</div>

<?php
    include 'editKlient.php';
    include 'bottomPage.php';
    zamknijPoloczenie(); 
?>  