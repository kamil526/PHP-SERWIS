<?php
include 'topPage.php';

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

otworzPoloczenie();
?>

<!-- Wyciagniecie danych z tabeli Klienci i przypisanie ich do options -->
<?php
    $selectKlient = "SELECT idKlienta, imie, nazwisko FROM Klienci";
    $resultKlient = mysqli_query($polaczenie, $selectKlient);

    $optionsKlient = "";

    while($row = mysqli_fetch_array($resultKlient))
    {
        $optionsKlient .= '<option value = "'.$row['idKlienta'].'">'.$row['imie'].' '.$row['nazwisko'].'</option>';
    }
?>

<div class="container">
        <div class="w3-center">
            <div class="w3-bar">
                <button type="button" data-toggle="modal" data-target="#modalNoweZlecenie" class="w3-btn w3-green" >Nowe zlecenie</button>
                <button type="button" onclick="window.location.href='registerPracownik.php'" class="w3-btn w3-green" >Dodaj pracownika</button>
                <button type="button" onclick="window.location.href='addKlient.php'" class="w3-btn w3-green" >Dodaj klienta</button>
                <button type="button" onclick="window.location.href='wykazKlientow.php'" class="w3-btn w3-green" >Wykaz klientów</button>

            </div>
        </div>
        <br>
        <div class="row">
        <div class="col">
            <div class="w3-container col-md">
                <h1 class="w3-green" style="padding:10px;">Zlecenia</h1>
                
                    <div class="container">

                        <?php
                            if(isset($_POST['deleteZlecenie'])) 
                            {
                                global $polaczenie;
                                $idZlecenia = $_POST['idZlecenia'];
                                $rozkaz = "delete from Zlecenia where idZlecenia=$idZlecenia;";
                                mysqli_query($polaczenie, $rozkaz)
                                or exit("Błąd w zapytaniu: ".$rozkaz);
                            }
                        ?>
                        <?php
                                
                            $sql2="SELECT Zlecenia.idZlecenia, imie, nazwisko, dataDodania, dataPrzekazania, dataZakonczenia, 
                            statusZlecenia, rodzajZlecenia, opisZlecenia, wartoscZlecenia 
                            FROM Zlecenia INNER JOIN Klienci ON Zlecenia.idKlienta=Klienci.IdKlienta";
                            $result = mysqli_query($polaczenie, $sql2);
                            echo 
                            '<form method="post" action="panelPracownika.php" >
                                <div class="row featurette">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">ID Zlecenia</th>
                                                <th scope="col">Klient</th>
                                                <th scope="col">Data dodania</th>
                                                <th scope="col">Data przekazania</th>
                                                <th scope="col">Data zakończenia</th>
                                                <th scope="col">Status zlecenia</th>
                                                <th scope="col">Rodzaj</th>
                                                <th scope="col">Opis zlecenia</th>
                                                <th scope="col">Wartość</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                    <tbody>';

                                    while($query=mysqli_fetch_array($result))
                                    {
                                        echo "<tr> <th scope='row' name='idZlecenia' id='idZlecenia'>".$query['idZlecenia']."</th>";
                                        echo "<td>".$query['imie']." ".$query['nazwisko']."</td>";
                                        echo "<td>".$query['dataDodania']."</td>";
                                        echo "<td>".$query['dataPrzekazania']."</td>";
                                        echo "<td>".$query['dataZakonczenia']."</td>";
                                        echo "<td>".$query['statusZlecenia']."</td>";
                                        echo "<td>".$query['rodzajZlecenia']."</td>";
                                        echo "<td>".$query['opisZlecenia']."</td>";
                                        echo "<td>".$query['wartoscZlecenia']."</td>";
                                        echo "<td><a href='panelPracownika.php?idZlecenia=".$query['idZlecenia']."' class='w3-btn w3-green'>Edytuj </a></td>";
                                        echo "<td><a href='deleteZlecenie.php?idZlecenia=".$query['idZlecenia']."'  class='w3-btn w3-green'>Usuń </a></td>";
                                    }

                        ?>
                                            </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL NOWE ZLECENIE -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalNoweZlecenie"
      aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nowe zlecenie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <?php
                if(isset($_POST['zapisz']))
                {
                    $idPracownika=$_SESSION['idPracownika'] ?? '';
                    $dataDodania = $_POST['dataDodania'] ?? '';
                    $dataPrzekazania = $_POST['dataPrzekazania'] ?? '';
                    $dataZakonczenia = $_POST['dataZakonczenia'] ?? '';
                    $statusZlecenia = $_POST['statusZlecenia'] ?? '';
                    $rodzajZlecenia = $_POST['rodzajZlecenia'] ?? '';
                    $opisZlecenia = $_POST['opisZlecenia'] ?? '';
                    $opisUsterki = $_POST['opisUsterki'] ?? '';
                    $komentarzPracownika = $_POST['komentarzPracownika'] ?? '';
                    $markaPojazdu = $_POST['markaPojazdu'] ?? '';
                    $modelPojazdu = $_POST['modelPojazdu'] ?? '';
                    $wartoscZlecenia = $_POST['wartoscZlecenia'] ?? '';
                    $idKlienta = $_POST['idKlienta'] ?? '';
                    


                    $sql="INSERT INTO Zlecenia (idPracownika, idKlienta, dataDodania, dataPrzekazania, dataZakonczenia, 
                    statusZlecenia, rodzajZlecenia, opisZlecenia, opisUsterki, komentarzPracownika, 
                    markaPojazdu, modelPojazdu, wartoscZlecenia)
                    VALUES ('$idPracownika', '$idKlienta', '$dataDodania', '$dataPrzekazania', '$dataZakonczenia', '$statusZlecenia','$rodzajZlecenia', '$opisZlecenia'
                    , '$opisUsterki', '$komentarzPracownika', '$markaPojazdu', '$modelPojazdu', '$wartoscZlecenia')";
                    mysqli_query($polaczenie, $sql);

        /*              if (mysqli_query($polaczenie, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
                    }   */
                }
            
            ?>

            <!-- Zawartosc modala -->
            <form method="post" action="panelPracownika.php" id="modal-form">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data dodania:</b></label>
                        <input type="date" name="dataDodania"  value="<?php echo date('Y-m-d');?>" class="form-control"
                            min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"> 
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data przekazania:</b></label>
                        <input type="date" name="dataPrzekazania"  value="<?php echo date('Y-m-d');?>" class="form-control"
                            min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"> 
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data zakończenia:</b></label>
                        <input type="date" name="dataZakonczenia" value="<?php echo date('Y-m-d');?>" class="form-control"
                            min="<?php echo date('Y-m-d'); ?>" max="2100-12-01"> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Rodzaj zlecenia:</b></label>
                        <textarea class="form-control" name="rodzajZlecenia" rows="3"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Opis zlecenia:</b></label>
                        <textarea class="form-control" name="opisZlecenia" rows="3"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Opis usterki:</b></label>
                        <textarea class="form-control" name="opisUsterki" rows="3"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-4">   
                        <label class="w3-text-green"><b>Status zlecenia:</b></label>
                        <select class="form-control" name="statusZlecenia" list="exampleList">
                            <option value=""></<option>
                            <option value="Wycena">Wycena</<option>
                            <option value="Oczekujące">Oczekujące</<option>
                            <option value="W trakcie">Rozpoczęte</<option>
                            <option value="Zakończone">Zakończone</<option>
                        </select>
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Marka:</b></label>
                        <input type="text" class="form-control" name="markaPojazdu" placeholder="Marka pojazdu">
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Model:</b></label>
                        <input type="text" class="form-control" name="modelPojazdu" placeholder="Model pojazdu">
                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Klient:</b></label><br>
                        <select class="form-control" name="idKlienta" class="form-control">
                            <?php echo $optionsKlient;?>
                        </select>
                    </div> 
                    <div class="col-md-4">   
                        <label class="w3-text-green"><b>Wartość zlecenia:</b></label>
                        <input type="text" class="form-control" name="wartoscZlecenia">
                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">   
                        <label class="w3-text-green"><b>Komentarz pracownika:</b></label>
                        <textarea class="form-control" name="komentarzPracownika" rows="4"></textarea>
                    </div> 
                </div>


            </div>
            </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="w3-btn" data-dismiss="modal">Anuluj</button>
                <input class="w3-btn w3-green" type="submit" value="Zapisz" name="zapisz" form="modal-form">
            </div>
        </div>
    </div>
</div>
      

<?php
    include 'editZlecenieModalPracownik.php';
    include 'bottomPage.php';
    zamknijPoloczenie(); 
?>