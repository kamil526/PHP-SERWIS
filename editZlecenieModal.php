<?php
        if(isset($_POST['zapisz'])&&(isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
        {
            //pobieramy dane z pól
            $idKlienta = $_SESSION['idKlienta'] ?? '';
            $idZlecenia = $_POST['idZlecenia'] ?? '';
            $markaPojazdu = $_POST['markaPojazdu'] ?? '';
            $modelPojazdu = $_POST['modelPojazdu'] ?? '';
            $opisUsterki = $_POST['opisUsterki'] ?? '';
            $opisZlecenia = $_POST['opisZlecenia'] ?? '';
            $dataPrzekazania = $_POST['dataPrzekazania'] ?? NULL;
            $statusZlecenia = $_POST['statusZlecenia'] ?? '';

            $sql="UPDATE Zlecenia SET markaPojazdu='$markaPojazdu', modelPojazdu='$modelPojazdu', opisUsterki='$opisUsterki', 
            opisZlecenia='$opisZlecenia', dataPrzekazania='$dataPrzekazania',statusZlecenia='$statusZlecenia'
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
            //include 'upload.php';
        }
?>

<div class="modal fade bd-example2-modal-lg" tabindex="-1" role="dialog" id="modal1"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <?php 
                $idZlecenia=$_GET['idZlecenia'];
                $sql2="SELECT * FROM Zlecenia WHERE idKlienta='$idKlienta' AND idZlecenia='$idZlecenia'";
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
                <form method="post" action="zleceniaKlient.php" id="modal-form2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>idZlecenia:</b></label>

                                <input type="text" class="form-control" name="idZlecenia" readonly
                                value="<?php echo $query2['idZlecenia'];?>">

                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Marka pojazdu:</b></label>
                                <input type="text" class="form-control" name="markaPojazdu"
                                value="<?php echo $query2['markaPojazdu']; ?>" required data-validation>

                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Model pojazdu:</b></label>
                                <input type="text" class="form-control" name="modelPojazdu"
                                value="<?php echo $query2['modelPojazdu']; ?>" required data-validation>
                            </div>
                    
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Opis usterki:</b></label>
                                <textarea class="form-control" name="opisUsterki" rows=5 required data-validation><?php echo $query2['opisUsterki'];?></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Opis zlecenia:</b></label>
                                <textarea class="form-control" name="opisZlecenia" rows=5 required data-validation><?php echo $query2['opisZlecenia'];?></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Data Przekazania Pojazdu:</b></label>
                                <input type="date" class="form-control" name="dataPrzekazania" class="form-control" min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"
                                value="<?php echo $query2['dataPrzekazania']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green"><b>Status zlecenia:</b></label>
                                <select class="form-control" name="statusZlecenia" list="exampleList">
                                    <option><?php echo $query2['statusZlecenia']; ?></option>
                                    <option value="Akceptacja">Apceptacja</<option>
                                </select>
                            </div> 
                            <div class="col-md-4">   
                                <label class="w3-text-green"><b>Wartość zlecenia:</b></label>
                                <input type="text" class="form-control" name="wartoscZlecenia" readonly
                                    value="<?php echo number_format((float)$query2['wartoscZlecenia'],2,'.',''); ?>">
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <label class="w3-text-green"><b>Zdjęcie dodane do zlecenia:</b></label>
                                <a>  
                                    <?php
                                        $dirname = "uploads/$query2[idKlienta]/$idZlecenia/";
                                        $images = glob($dirname."*.jpg");
                                        foreach($images as $image) {
                                            echo '<img class="col-md-12" style="" src="'.$image.'" /><br />';
                                        }
                                    ?>                          
                                </a>
                            </div>
                        </div>


                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="w3-btn" data-dismiss="modal">Anuluj</button>
                        <input class="w3-btn w3-green" type="submit" value="Zapisz" name="zapisz" form="modal-form2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    zamknijPoloczenie(); 
?>  