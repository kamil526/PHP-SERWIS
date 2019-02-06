<?php
    include 'topPage.php';
    otworzPoloczenie();

    if(isset($_GET['idZlecenia'])){
        $idZlecenia=$_GET['idZlecenia'];
        if(isset($_POST['submit']))
    }

    $firstname=$_POST['firstname'];
    $firstname=$_POST['firstname'];
    $firstname=$_POST['firstname'];
    $firstname=$_POST['firstname'];
    $firstname=$_POST['firstname'];

    $sqlUpdate="UPDATE Zlecenia set dataDodania=,, 
    opisZlecenia= ";

?>
        <form class="col-md-10" method="post" action="wycena.php" >
            <div class="row featurette">

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="w3-text-green"><b>Marka:</b></label>
                        <input type="text" class="form-control" name="marka" placeholder="Marka pojazdu"
                        value="<?php echo $query['marka']; ?>
                    </div>
                    <div class="form-group">
                        <label class="w3-text-green"><b>Model:</b></label>
                        <input type="text" class="form-control" name="model" placeholder="Model pojazdu"
                        value="<?php echo $query['model']; ?>
                    </div>
                    <div class="form-group">
                        <label class="w3-text-green"><b>Opis usterki:</b></label>
                        <textarea class="form-control" name="opisUsterki" 
                            placeholder="Tutaj szczegółowo usterkę pojazdu, na jej podstawie, oszacujemy koszt naprawy" rows="8"
                            value="<?php echo $query['opisUsterki']; ?>
                        </textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="w3-text-green"><b>Opis zlecenia:</b></label>
                        <textarea class="form-control" name="opisZlecenia" 
                        placeholder="Tutaj opisz na czym ma polgać zlecenie" rows="6"
                        value="<?php echo $query['opisZlecenia']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="w3-text-green"><b>Data przekazania pojazdu:</b></label>
                        <input type="date" name="dataPrzekazaniaPojazdu"
                        value="<?php echo $query['dataPrzekazaniaPojazdu']; ?>    
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
	if(isset($_POST['deleteWycena'])) {
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

while($query=mysqli_fetch_array($result)){
    echo "<tr> <th scope='row' name='idZlecenia' id='idZlecenia'>".$query['idZlecenia']."</th>";
    echo "<td>".$query['dataDodania']."</td>";
    echo "<td>".$query['statusZlecenia']."</td>";
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



<?php
    include 'bottomPage.php';
    
?>  