<?php
    include 'topPage.php';

    if ($_SESSION['logged']==false){
        header('Location: loginPracownik.php');
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




<div class="container">
    <h1 class="w3-green" style="padding:10px;">Moje Zlecenia</h1>
    <div class="row featurette">
        <div class="col-md-2">
            <form>
                <input type="button" value="Nowe Zlecenie" onclick="window.location.href='noweZlecenieKlient.php'" 
                class="w3-btn w3-green" style="width:100%"/>
            </form>
            <br>
            <form>
                <input type="button" value="Moje Zlecenia" onclick="window.location.href='zleceniaKlient.php'" 
                class="w3-btn w3-green" style="width:100%"/>
            </form>
            <br>
            <button type="button" class="w3-btn w3-green" style="width:100%" data-toggle="modal" data-target=".bd-example-modal-lg">Moje dane</button>
            <br>
            <br>
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
                $sql="SELECT idZlecenia, dataDodania, markaPojazdu, modelPojazdu, statusZlecenia, round(wartoscZlecenia,2) as wartoscZlecenia 
                FROM Zlecenia WHERE idKlienta=$idKlienta";
                    $result = mysqli_query($polaczenie, $sql);
                echo '<div class="container">
                <form class="col-md-12" method="post" action="zleceniaKlient.php" >
                <div class="row">
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Nr zlecenia</th>
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
                    echo "<td>".$query['wartoscZlecenia']." zł</td>";
                    //ECHO "<td><button type='submit' id='buttonform' name='edit' value=".$query['idZlecenia']." class='w3-btn w3-green' data-toggle='modal' data-target='.bd-example2-modal-lg'>Edytuj</button></td>";
                    echo "<td><a href='zleceniaKlient.php?idZlecenia=".$query['idZlecenia']."' class='w3-btn w3-green'>Edytuj </a></td>";
                    echo "<td><a href='deleteZlecenie.php?idZlecenia=".$query['idZlecenia']."' class='w3-btn w3-red'>Usuń </a></td></form>";
 
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
<?php
include 'editKlient.php';
include 'editZlecenieModal.php';
include 'bottomPage.php';
?>  