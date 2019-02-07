<?php
        if(isset($_POST['zapisz']))
        {
            //pobieramy dane z pól
            $idKlienta = $_SESSION['idKlienta'] ?? '';
            $idZlecenia = $_POST['idZlecenia'] ?? '';
            $markaPojazdu = $_POST['markaPojazdu'] ?? '';
            $modelPojazdu = $_POST['modelPojazdu'] ?? '';
            $opisUsterki = $_POST['opisUsterki'] ?? '';
            $opisZlecenia = $_POST['opisZlecenia'] ?? '';
            $dataPrzekazania = $_POST['dataPrzekazania'] ?? '';

            $sql="UPDATE Zlecenia SET markaPojazdu='$markaPojazdu', modelPojazdu='$modelPojazdu', opisUsterki='$opisUsterki', 
            opisZlecenia='$opisZlecenia', dataPrzekazania='$dataPrzekazania'
            WHERE idZlecenia='$idZlecenia'";
            

            mysqli_query($polaczenie, $sql);
/*          if (mysqli_query($polaczenie, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
            }   */ 
        }
?>

<div class="modal fade bd-example2-modal-lg" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <?php 
                $sql2="SELECT * FROM Zlecenia WHERE idKlienta='$idKlienta'";
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
                                <input type="text" class="form-control" name="opisUsterki"
                                value="<?php echo $query2['opisUsterki']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Opis zlecenia:</b></label>
                                <input type="text" class="form-control" name="opisZlecenia"
                                value="<?php echo $query2['opisZlecenia']; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Data Przekazania Pojazdu:</b></label>
                                <input type="date" class="form-control" name="dataPrzekazania" class="form-control"
                                value="<?php echo $query2['dataPrzekazania']; ?>">
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