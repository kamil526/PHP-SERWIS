<?php
    include 'topPage.php';


    otworzPoloczenie();
?>




<div class="container">
    <h1 class="w3-green" style="padding:10px;">Wykaz kontrahentów</h1>
    <div class="row featurette">
        <div class="col-md-12">
                <?php
                $sql="SELECT idKlienta, login, imie, nazwisko, nazwaFirmy FROM Klienci";
                    $result = mysqli_query($polaczenie, $sql);
                echo '<div class="container">
                <form class="col-md-12" method="post" action="zleceniaKlient.php" >
                <div class="row featurette">
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Login</th>
                            <th scope="col">Imie</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Nazwa Firmy</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>';

                while($query=mysqli_fetch_array($result))
                {
                    echo "<form name='submit' action='wykazKlientow.php' method='POST' id='modal-form3'>";
                    echo "<tr> <th scope='row' name='ID' id='idKlienta'>".$query['idKlienta']."</th>";
                    echo "<td>".$query['login']."</td>";
                    echo "<td>".$query['imie']."</td>";
                    echo "<td>".$query['nazwisko']."</td>";
                    echo "<td>".$query['nazwaFirmy']."</td>";
                    ECHO "<td><button type='submit' id='buttonform' name='edit' value=".$query['idKlienta']." class='w3-btn w3-green' data-toggle='modal' data-target='.bd-example2-modal-lg'>Wyswietl zlecenia</button></td>";
                    //echo "<td><a href='zleceniaKlient.php?idZlecenia=".$query['idZlecenia']."' class='w3-btn w3-green'>Wyswietl zlecenia </a></td>";
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

include 'bottomPage.php';
?>  