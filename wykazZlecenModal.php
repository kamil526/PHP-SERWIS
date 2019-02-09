<?php

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

?>




<div class="modal fade bd-example3-modal-lg" tabindex="-1" role="dialog" id="modal3"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Wykaz zleceń klienta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Zawartosc modala -->
                <form id="modal-formm"> 
                    <div class="container-fluid">    
                        <?php

                        $idKlienta=$_GET['idKlienta'];
                        $sql="SELECT idZlecenia, dataDodania, markaPojazdu, modelPojazdu, statusZlecenia, round(wartoscZlecenia,2) as wartoscZlecenia 
                                FROM Zlecenia WHERE idKlienta=$idKlienta";
                        $result=mysqli_query($polaczenie, $sql);
                        echo'<div class="container">
                        
                                <div class="row">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                            <th scope="col">ID zlecenia</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Marka pojazdu</th>
                                            <th scope="col">Model pojazdu</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Kwota</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            while($query=mysqli_fetch_array($result))
                                            {
                                                echo "<tr> <th scope='row' name='idZlecenia'>".$query['idZlecenia']."</th>";
                                                echo "<td>".$query['dataDodania']."</td>";
                                                echo "<td>".$query['markaPojazdu']."</td>";
                                                echo "<td>".$query['modelPojazdu']."</td>";
                                                echo "<td>".$query['statusZlecenia']."</td>";
                                                echo "<td>".$query['wartoscZlecenia']." zł</td></tr>";
                                            }
                
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="w3-btn w3-red" data-dismiss="modal">Zamknij</button>
                        
                    </div>

               </form> 
            </div>
        </div>
    </div>
</div>