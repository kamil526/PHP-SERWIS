<div class="modal fade bd-example3-modal-lg" tabindex="-1" role="dialog" id="modal3"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Wykaz zleceń kontrahenta</h5>
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
                        
                                <div class="row featurette">
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
                                                echo "<td>".$query['wartoscZlecenia']."</td></tr>";
                                            }
                
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="w3-btn" data-dismiss="modal">Close</button>
                        
                    </div>

               </form> 
            </div>
        </div>
    </div>
</div>