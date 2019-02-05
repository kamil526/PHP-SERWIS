<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<div class="row">
    <div class="col-sm-2">
        <div class=" w3-bar-block w3-large" > 
            <a href="panelPracownika.php" class="w3-bar-item w3-button w3-hover-green">Zlecenia</a>
            <a href="panelPracownikaWyceny.php" class="w3-bar-item w3-button w3-hover-green">Wyceny</a>
            <br>
            <br>
            <a href="registerPracownik.php" class="w3-bar-item w3-button w3-hover-green">Dodaj pracownika</a>
        </div>
    </div>

    <div class="col">
        <div class="w3-container col-md">
            <h1 class="w3-green" style="padding:10px;">Wyceny</h1>
            
                <div class="container">

                    <?php
                        if(isset($_POST['deleteWycena'])) 
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
                                            <th scope="col">Data zakończenia</th>
                                            <th scope="col">Status zlecenia</th>
                                            <th scope="col">Rodzaj</th>
                                            <th scope="col">Opis</th>
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
                                        
<?php
    zamknijPoloczenie(); 
?>