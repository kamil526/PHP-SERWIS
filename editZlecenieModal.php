<div class="modal fade bd-example2-modal-lg" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <?php
        $idZlecenia = $_POST['idZlecenia'] ?? '';
        if(isset($_POST['zapisz'])){
            //pobieramy dane z pól
            $markaPojazdu = $_POST['markaPojazdu'] ?? '';
            $modelPojazdu = $_POST['modelPojazdu'] ?? '';
            $opisUsterki = $_POST['opisUsterki'] ?? '';
            $opisZlecenia = $_POST['opisZlecenia'] ?? '';
            $dataPrzekazaniaPojazdu = $_POST['dataPrzekazaniaPojazdu'] ?? '';

            $sql="UPDATE Zlecenia set opisZlecenia='$opisZlecenia',opisUsterki='$opisUsterki',markaPojazdu='$markaPojazdu',modelPojazdu='$modelPojazdu'
                    where idZlecenia=$idZlecenia";
                
                mysqli_query($polaczenie, $sql);
        }
        /*
        $select="select imie, nazwisko, email, telefon, nrDomu, kodPocztowy, ulica, miasto, nazwaFirmy, nip FROM Klienci where idKlienta=$idKlienta";
        $result=mysqli_query($polaczenie, $select);     
        $query=mysqli_fetch_array($result);
        */
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
                <form method="post" action="zleceniaKlient.php" id="modal-form">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>idZlecenia:</b></label>
                                <input type="text" class="form-control" name="idZlecenia"
                                value="<?php echo $idZlecenia; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Marka pojazdu:</b></label>
                                <input type="text" class="form-control" name="markaPojazdu"
                                value="<?php echo $markaPojazdu; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Model pojazdu:</b></label>
                                <input type="text" class="form-control" name="modelPojazdu"
                                value="<?php echo $modelPojazdu; ?>" required data-validation>
                            </div>
                    
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Opis usterki:</b></label>
                                <input type="text" class="form-control" name="opisUsterki"
                                value="<?php echo $opisUsterki; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Opis zlecenia:</b></label>
                                <input type="text" class="form-control" name="opisZlecenia"
                                value="<?php echo $opisZlecenia; ?>" required data-validation>
                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Data Przekazania Pojazdu:</b></label>
                                <input type="text" class="form-control" name="dataPrzekazaniaPojazdu"
                                value="<?php echo $dataPrzekazaniaPojazdu; ?>" required data-validation>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="w3-btn" data-dismiss="modal">Close</button>
                        <input class="w3-btn w3-green" type="submit" value="Zapisz" name="zapisz" form="modal-form">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>