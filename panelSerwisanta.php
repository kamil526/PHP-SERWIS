<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<section class="page">
    
<div class="w3-sidebar w3-bar-block w3-border w3-large" style="max-width:20%"> 
  <a href="#" class="w3-bar-item w3-button w3-hover-green">Zlecenia</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-green">Wyceny</a>
</div>

<div class="w3-main" style="margin-left:200px">

<div >
  <div class="w3-container">
    <h1 class="w3-green">Zlecenia</h1>
    <!-- <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Id zlecenia</th>
                    <th>Id Klienta</th>
                    <th>Data dodania</th>
                    <th>Data zakonczenia</th>
                    <th>Status zlecenia</th>
                    <th>Rodzaj zlecenia</th>
                    <th>Opis zlecenia</th>
                    <th>Wartosc zlecenia</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div> -->
    
    <?php
    
    if($result = $polaczenie->query("SELECT * FROM Zlecenia"))
    {
        // Jeśli liczba row jest niezerowa
        if($result->num_rows)
        {

            while($row = $result->fetch_assoc())
            {
                echo $row['idZlecenia'], ' | ', $row['idKlienta'], ' | ', $row['dataDodania'], ' | ', $row['dataZakonczenia'], 
                    ' | ', $row['statusZlecenia'], ' | ', $row['rodzajZlecenia'], ' | ', $row['opisZlecenia'],  ' | ', $row['wartoscZlecenia'], "<br>";
            }
            $result->free();
        }
    }
    
    ?>

  </div>
  </div>
</div>
</section>