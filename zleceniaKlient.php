<?php
    include 'topPage.php';
    otworzPoloczenie();
?>
<?php
if ($_SESSION['logged']==false){
    header('Location: loginKlient.php');
    //nie wykonuj kodu poniżej
    exit();
}
?>



<div class="container">
    <h1 class="w3-green" style="padding:10px;">Moje Zlecenia</h1>
    <div class="row featurette">
        <div class="col-md-2">
            <form>
                <input type="button" value="Nowe Zlecenie" onclick="window.location.href='noweZlecenieKlient.php'" 
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

        <div class="col-md-10">
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
                $sql="SELECT idZlecenia, dataDodania, markaPojazdu, modelPojazdu, statusZlecenia, wartoscZlecenia  FROM Zlecenia WHERE idKlienta=$idKlienta";
                    $result = mysqli_query($polaczenie, $sql);
                echo '<div class="container">
                <form class="col-md-12" method="post" action="zleceniaKlient.php" >
                <div class="row featurette">
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">ID Zlecenia</th>
                        <th scope="col">Data</th>
                        <th scope="col">Marka pojazdu</th>
                        <th scope="col">Model pojazdu</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kwota</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>';

                while($query=mysqli_fetch_array($result))
                {
                    echo "<form name='submit' action='zleceniaKlient.php' method='POST' id='modal-form3'>";
                    echo "<tr> <th scope='row' name='idZlecenia' id='idZlecenia'>".$query['idZlecenia']."</th>";
                    echo "<td>".$query['dataDodania']."</td>";
                    echo "<td>".$query['markaPojazdu']."</td>";
                    echo "<td>".$query['modelPojazdu']."</td>";
                    echo "<td>".$query['statusZlecenia']."</td>";
                    echo "<td>".$query['wartoscZlecenia']."</td>";
                    ECHO "<td><button type='button' name='edit' value=".$query['idZlecenia']." class='w3-btn w3-green' data-toggle='modal' data-target='.bd-example2-modal-lg'>Edytuj</button></td>";
                    //echo "<td><a href='editZlecenieModal.php?idZlecenia=".$query['idZlecenia']."' class='w3-btn w3-green'>Edytuj </a></td></form>";
                    echo "<td><a href='deleteZlecenie.php?idZlecenia=".$query['idZlecenia']."' class='w3-btn w3-green'>Usuń </a></td></form>";
 
                }

                ?>


                        </tr>
                    </tbody>
                    </table>
                </div>
                </form>
        </div>

    

<?php
    include 'editKlient.php';
    include 'editZlecenieModal.php';
    include 'bottomPage.php';
?>  