<?php
    include 'topPage.php';
    otworzPoloczenie();
?>


<?php

    if(isset($_POST['dataDodania']))
    {
        $idKlienta = $_POST['idKlienta'] ?? '';
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

        $sql="INSERT INTO Zlecenia (idKlienta, dataDodania, dataPrzekazania, dataZakonczenia, 
        statusZlecenia, rodzajZlecenia, opisZlecenia, opisUsterki, komentarzPracownika, 
        markaPojazdu, modelPojazdu, wartoscZlecenia)
        VALUES ('$idKlienta', '$dataDodania', '$dataPrzekazania', '$dataZakonczenia', '$statusZlecenia','$rodzajZlecenia', '$opisZlecenia'
        , '$opisUsterki', '$komentarzPracownika', '$markaPojazdu', '$modelPojazdu', '$wartoscZlecenia')";
        mysqli_query($polaczenie, $sql);

    }
?>


<div class="row">
    <div class="col-sm-2">
        <div class=" w3-bar-block w3-large" > 
            <button type="button" class="w3-btn w3-hover-green" data-toggle="modal" data-target=".bd-example-modal-lg">Nowe zlecenie</button>
            <br><br><br>
            <form><input type="button" value="Dodaj pracownika" onclick="window.location.href='registerPracownik.php'" class="w3-btn w3-hover-green" /></form>
        </div>
    </div>

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
                            
                        $sql="SELECT * FROM Zlecenia";
                        $result = mysqli_query($polaczenie, $sql);
                        echo 
                        '<form method="post" action="panelPracownika.php" >
                            <div class="row featurette">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID Zlecenia</th>
                                            <th scope="col">ID Klienta</th>
                                            <th scope="col">Data dodania</th>
                                            <th scope="col">Data przekazania</th>
                                            <th scope="col">Data zakończenia</th>
                                            <th scope="col">Status zlecenia</th>
                                            <th scope="col">Rodzaj</th>
                                            <th scope="col">Opis zlecenia</th>

                                            <th scope="col">Wartość</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                <tbody>';

                                while($query=mysqli_fetch_array($result))
                                {
                                    echo "<tr> <th scope='row' name='idZlecenia' id='idZlecenia'>".$query['idZlecenia']."</th>";
                                    echo "<td>".$query['idKlienta']."</td>";
                                    echo "<td>".$query['dataDodania']."</td>";
                                    echo "<td>".$query['dataZakonczenia']."</td>";
                                    echo "<td>".$query['dataPrzekazania']."</td>";
                                    echo "<td>".$query['statusZlecenia']."</td>";
                                    echo "<td>".$query['rodzajZlecenia']."</td>";
                                    echo "<td>".$query['opisZlecenia']."</td>";
                                    echo "<td>".$query['wartoscZlecenia']."</td>";
                                    
                                    echo "<td><a href='deleteWycena.php?idZlecenia=".$query['idZlecenia']."'  class='w3-btn w3-green'>Usuń </a></td>";
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" 
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
            <!-- Zawartosc modala -->
            <form method="post" action="panelPracownika.php">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data dodania:</b></label>
                        <input type="date" name="dataDodania" max="3000-12-31" min="2019-01-01" class="form-control"> 
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data przekazania:</b></label>
                        <input type="date" name="dataPrzekazania" max="3000-12-31" min="2019-01-01" class="form-control"> 
                    </div>
                    <div class="col-md-4">
                        <label class="w3-text-green" ><b>Data zakończenia:</b></label>
                        <input type="date" name="dataZakonczenia" max="3000-12-31" min="2019-01-01" class="form-control"> 
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
                        <input type="text" class="form-control" name="statusZlecenia">
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
                        <label class="w3-text-green"><b>Klient:</b></label>
                        <input type="text" class="form-control" name="idKlienta">
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
                <button type="button" class="w3-btn" data-dismiss="modal">Close</button>
                <input type="submit" class="w3-btn w3-green" value="Zapisz" name="zapisz">
            </div>
        </div>
    </div>
</div>




<?php
    include 'bottomPage.php';
    zamknijPoloczenie(); 
?>