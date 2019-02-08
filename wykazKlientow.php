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


<div class="container">
    <h1 class="w3-green" style="padding:10px;">Wykaz kontrahentów</h1>
    <div class="row">
        <div class="col-md-12">
                <?php
                //$sql="SELECT idKlienta, login, imie, nazwisko, nazwaFirmy FROM Klienci";
                $sql='SELECT Klienci.idKlienta, login, imie, nazwisko, nazwaFirmy, round(sum(Zlecenia.wartoscZlecenia),2) as wartoscZlecen 
                FROM Klienci left join Zlecenia on Zlecenia.idKlienta=Klienci.idKlienta GROUP BY Klienci.idKlienta';
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
                            <th scope="col">Wartość Zlec.</th>
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
                    echo "<td>".$query['wartoscZlecen']." zł</td>";
                    echo "<td><a href='wykazKlientow.php?idKlienta=".$query['idKlienta']."' class='w3-btn w3-green'>Wyświetl zlec. </a></td>";
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
include 'wykazZlecenModal.php';
include 'bottomPage.php';
?>  