<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<section class="page">
    
<div class="w3-sidebar w3-bar-block w3-border w3-large" style="max-width:100px"> 
  <a href="#" class="w3-bar-item w3-button w3-hover-green">Zlecenia</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-green">Wyceny</a>
</div>

<div class="w3-main" style="margin-left:100px">

<div >
  <div class="w3-container col-md-7">
    <h1 class="w3-green" style="padding:10px;">Zlecenia</h1>
    <div class="row">
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
        
        $sql="SELECT * FROM Zlecenia";
        $result = mysqli_query($polaczenie, $sql);
        echo '<div class="container">
                <form class="col-md-12" method="post" action="panelSerwisanta.php" >
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
</div>
</section>

<?php
    zamknijPoloczenie(); 
?>