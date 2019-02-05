<?php
$idKlienta =$_SESSION['idKlienta'] ?? '';
$sql="SELECT idZlecenia, dataDodania, statusZlecenia, wartoscZlecenia FROM Zlecenia WHERE idKlienta=$idKlienta";
    $result = mysqli_query($polaczenie, $sql);
echo '<div class="container">
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

while($query=mysqli_fetch_array($result))
{
echo '<tr><th scope="row">'.$query['idZlecenia']."</th>";
echo "<td>".$query['dataDodania']."</td>";
echo "<td>".$query['statusZlecenia']."</td>";
echo "<td>".$query['wartoscZlecenia']."</td>";
echo '<td>               
        <button type="submit" class="w3-btn w3-green"name="edytuj">Edytuj</button>      
        <button type="submit" class="w3-btn w3-green"name="usun">Usuń</button>
    </td>';
}
?>
        </tr>
    </tbody>
    </table>
</div>
</div>