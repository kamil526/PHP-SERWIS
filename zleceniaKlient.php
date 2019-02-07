<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

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


<div class="container">
    <h1 class="w3-green" style="padding:10px;">Moje Zlecenia</h1>
    <div class="row featurette">
        <div class="col-md-2">
            <form>
                <input type="button" value="Nowe Zlecenie" onclick="window.location.href='zlecenieKlient.php'" 
                class="w3-btn w3-green" />
            </form>
            <br>
            <form>
                <input type="button" value="Moje Zlecenia" onclick="window.location.href='zleceniaKlient.php'" 
                class="w3-btn w3-green" />
            </form>
            <br>
            <button type="button" class="w3-btn w3-green" data-toggle="modal" data-target=".bd-example-modal-lg">Moje dane</button>
        </div>

        <!-- było 
            <form class="col-md-10" method="post" action="zlecenieKlient.php" > 
        -->
        <form class="col-md-10" method="post" action="zleceniaKlient.php" >
            <div class="row featurette">



                <?php
                    if(isset($_POST['deleteZlecenie'])) {
                        global $polaczenie;
                        $idZlecenia = $_POST['idZlecenia'];
                        $rozkaz = "delete from Zlecenia where idZlecenia=$idZlecenia;";
                        mysqli_query($polaczenie, $rozkaz)
                        or exit("Błąd w zapytaniu: ".$rozkaz);
                    }
                ?>

                <?php
                $idKlienta =$_SESSION['idKlienta'] ?? '';
                $sql="SELECT idZlecenia, dataDodania, statusZlecenia, wartoscZlecenia FROM Zlecenia WHERE idKlienta=$idKlienta";
                    $result = mysqli_query($polaczenie, $sql);
                echo '<div class="container">
                <form class="col-md-12" method="post" action="wycena.php" >
                <div class="row featurette">
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">ID Zlecenia</th>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kwota</th>
                        <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>';

                while($query=mysqli_fetch_array($result))
                {
                    echo "<form name='submit' action='zleceniaKlient.php' method='POST'>";
                    echo "<tr> <th scope='row' name='idZlecenia' id='idZlecenia'>".$query['idZlecenia']."</th>";
                    echo "<td>".$query['dataDodania']."</td>";
                    echo "<td>".$query['statusZlecenia']."</td>";
                    echo "<td>".$query['wartoscZlecenia']."</td>";
                    ECHO "<td><button type='button' class='w3-btn w3-green' data-toggle='modal' data-target='.bd-example2-modal-lg'>Edytuj</button></td>";
                    echo "<td><a href='deleteZlecenie.php?idZlecenia=".$query['idZlecenia']."'  class='w3-btn w3-green'>Usuń </a></td></form>";
 
                }

                ?>


                        </tr>
                    </tbody>
                    </table>
                </div>
                </form>
                </div>

                            
                            </div>
                        </form>


                    </div>
            </div>

    <!--   TUTAJ MODAL DLA EDYCJI ZLECENIA  -->

    <?php
        $idZlecenia = $_POST['idZlecenia'] ?? '';
        if(isset($_POST['zapisz'])){
            //pobieramy dane z pól
            $markaPojazdu = $_POST['markaPojazdu'] ?? '';
            $modelPojazdu = $_POST['modelPojazdu'] ?? '';
            $opisUsterki = $_POST['opisUsterki'] ?? '';
            $opisZlecenia = $_POST['opisZlecenia'] ?? '';
            $dataPrzekazaniaPojazdu = $_POST['dataPrzekazaniaPojazdu'] ?? '';

            $sql="UPDATE Zlecenia set opisZlecenia='$opisZlecenia',opisUsterki='$opisUsterki',
            markaPojazdu='$markaPojazdu',modelPojazdu='$modelPojazdu'
                    where idZlecenia=$idZlecenia";
                
                mysqli_query($polaczenie, $sql);
        }
        /*
        $select="select imie, nazwisko, email, telefon, nrDomu, kodPocztowy, ulica, miasto, nazwaFirmy, nip FROM Klienci where idKlienta=$idKlienta";
        $result=mysqli_query($polaczenie, $select);     
        $query=mysqli_fetch_array($result);
        */
    ?>


    <div class="modal fade bd-example2-modal-lg" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <?php 
            $idKlienta =$_SESSION['idKlienta'] ?? '';
            $sql2="SELECT idZlecenia, dataDodania, statusZlecenia, wartoscZlecenia FROM Zlecenia WHERE idKlienta=$idKlienta";
            $result2 = mysqli_query($polaczenie, $sql2);
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

                                <input type="text" class="form-control" name="imie"
                                value="<?php echo $query['idZlecenia']; ?>" readonly>

                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Marka pojazdu:</b></label>
                                <input type="text" class="form-control" name="markaPojazdu"
                                value="<?php echo $query['markaPojazdu']; ?>" required data-validation>

                            </div>
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Model pojazdu:</b></label>
                                <input type="text" class="form-control" name="modelPojazdu"
                                value="<?php echo $query['modelPojazdu']; ?>" required data-validation>
                            </div>
                    
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="w3-text-green" ><b>Opis usterki:</b></label>
                                <input type="text" class="form-control" name="opisUsterki"
                                value="<?php echo $query['opisUsterki']; ?>" required data-validation>
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
                        <input class="w3-btn w3-green" type="submit" value="Zapisz" name="zapisz" form="modal-form2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
    //include 'editZlecenieModal.php';
    //include 'editKlient.php';
    include 'bottomPage.php';

?>  