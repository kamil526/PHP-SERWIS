<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<?php

        

    
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

                            
                            </div>
                        </form>


                    </div>
            </div>

<?php
    include 'editKlient.php';
    include 'bottomPage.php';
    
?>  