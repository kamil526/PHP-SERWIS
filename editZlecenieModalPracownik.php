<?php
    if ($_SESSION['logged']==false){
        header('Location: loginPracownik.php');
        //nie wykonuj kodu poniżej
        exit();
    }
    if(($_SESSION['logged']==true)&&($_SESSION['typUsera']==2)){
        echo '<br> <div class="alert alert-danger" role="alert">
            <center>Nie masz odpowiednich uprawnień!</center>
            </div>';
        include 'bottomPage.php';    
        exit();
    }
?>


<?php
        if(isset($_POST['zapisz']))
        {
            //pobieramy dane z pól
            $idZlecenia = $_POST['idZlecenia'] ?? '';
            $idPracownika = $_SESSION['idPracownika'] ?? '';
            $dataDodania = $_POST['dataDodania'] ?? NULL;
            $dataPrzekazania = $_POST['dataPrzekazania'] ?? NULL;
            $dataZakonczenia = $_POST['dataZakonczenia'] ?? NULL;
            $statusZlecenia = $_POST['statusZlecenia'] ?? '';
            $rodzajZlecenia = $_POST['rodzajZlecenia'] ?? '';
            $opisZlecenia = $_POST['opisZlecenia'] ?? '';
            $opisUsterki = $_POST['opisUsterki'] ?? '';
            $komentarzPracownika = $_POST['komentarzPracownika'] ?? '';
            $markaPojazdu = $_POST['markaPojazdu'] ?? '';
            $modelPojazdu = $_POST['modelPojazdu'] ?? '';
            $wartoscZlecenia = str_replace(',', '.',$_POST['wartoscZlecenia']) ?? NULL;

            

            $sql="UPDATE Zlecenia SET dataDodania='$dataDodania', dataPrzekazania='$dataPrzekazania', dataZakonczenia='$dataZakonczenia', 
            statusZlecenia='$statusZlecenia', rodzajZlecenia='$rodzajZlecenia', opisZlecenia='$opisZlecenia', komentarzPracownika='$komentarzPracownika',
            markaPojazdu='$markaPojazdu', modelPojazdu='$modelPojazdu', wartoscZlecenia='$wartoscZlecenia'
            WHERE idZlecenia='$idZlecenia'"; 
        

            //mysqli_query($polaczenie, $sql);
            if (mysqli_query($polaczenie, $sql)) 
            {
                echo'<br> <div class="alert alert-success" role="alert">
                        <center>Operacja została wykonana poprawnie.</center>
                    </div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
            }    
            
        }
?>

<div class="modal fade bd-example2-modal-lg" tabindex="-1" role="dialog" id="modalEZP"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <?php 
                $idZlecenia=$_GET['idZlecenia'];
                $sql2="SELECT * FROM Zlecenia INNER JOIN Klienci ON Zlecenia.idKlienta=Klienci.IdKlienta WHERE idZlecenia='$idZlecenia'";
                $result2 = mysqli_query($polaczenie, $sql2);
                $query2 = mysqli_fetch_array($result2);
              
    ?>

    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edycja danych Zlecenia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Zawartosc modala -->
                <form method="post" action="panelPracownika.php" id="modal-form3">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data dodania:</b></label>
                        <input type="date" class="form-control" name="dataDodania" class="form-control"  min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"
                                value="<?php echo $query2['dataDodania']; ?>"> 
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data przekazania:</b></label>
                        <input type="date" class="form-control" name="dataPrzekazania" class="form-control"  min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"
                                value="<?php echo $query2['dataPrzekazania']; ?>"> 
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data zakończenia:</b></label>
                        <input type="date" class="form-control" name="dataZakonczenia" class="form-control"  min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"
                                value="<?php echo $query2['dataZakonczenia'];?>"> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Rodzaj zlecenia:</b></label>
                        <textarea class="form-control" name="rodzajZlecenia" rows=5 ><?php echo $query2['rodzajZlecenia'];?></textarea>

                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Opis zlecenia:</b></label>
                        <textarea class="form-control" name="opisZlecenia" rows=5 ><?php echo $query2['opisZlecenia'];?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Opis usterki:</b></label>
                        <textarea class="form-control" name="opisUsterki" rows=5 ><?php echo $query2['opisUsterki'];?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-4">   
                        <label class="w3-text-green"><b>Status zlecenia:</b></label>
                        <select class="form-control" name="statusZlecenia" list="exampleList">
                            <option><?php echo $query2['statusZlecenia']; ?></option>
                            <option value="Wycena">Wycena</<option>
                            <option value="Oczekujące">Oczekujące</<option>
                            <option value="W trakcie">Rozpoczęte</<option>
                            <option value="Zakończone">Zakończone</<option>
                        </select>
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Marka:</b></label>
                        <input type="text" class="form-control" name="markaPojazdu"
                                value="<?php echo $query2['markaPojazdu']; ?>" required data-validation>
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Model:</b></label>
                        <input type="text" class="form-control" name="modelPojazdu"
                                value="<?php echo $query2['modelPojazdu']; ?>" required data-validation>
                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Id zlecenia:</b></label>
                        <input type="text" class="form-control" name="idZlecenia" readonly
                                value="<?php echo $query2['idZlecenia']; ?>">
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Klient:</b></label><br>
                        <input type="text" class="form-control" name="idKlienta" readonly
                            value="<?php echo $query2['imie']; ?> <?php echo $query2['nazwisko']; ?>">
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Wartość zlecenia:</b></label>
                        <input type="text" class="form-control" name="wartoscZlecenia"
                            value="<?php echo number_format((float)$query2['wartoscZlecenia'],2,'.',''); ?>">
                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">   
                        <label class="w3-text-green"><b>Komentarz pracownika:</b></label>
                        <textarea class="form-control" name="komentarzPracownika" rows=5 ><?php echo $query2['komentarzPracownika'];?></textarea>
                    </div> 
                    <div class="col-md-6"> 
                        <label class="w3-text-green"><b>Zdjęcie dodane do zlecenia:</b></label>
                        <a>  
                            <?php
                                $dirname = "uploads/$query2[idKlienta]/$idZlecenia/";
                                $images = glob($dirname."*.jpg");
                                foreach($images as $image) {
                                    echo '<img style="width:300px" src="'.$image.'" /><br />';
                                }
                            ?>                          
                        </a>
                    </div>
                </div>
                
                <br>
                <div class="modal-footer">
                    <button type="button" class="w3-btn" data-dismiss="modal">Anuluj</button>
                    <input class="w3-btn w3-green" type="submit" value="Zapisz" name="zapisz" form="modal-form3">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    
?>  