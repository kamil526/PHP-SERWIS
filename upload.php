<?php
    if ($_SESSION['logged']==false){
        header('Location: index.php');
        exit();
    }
?>

<?php
    otworzPoloczenie();
    $idKlienta =$_SESSION['idKlienta'] ?? '';

    $sql="SELECT idZlecenia FROM Zlecenia WHERE idKlienta=$idKlienta ORDER BY idZlecenia DESC LIMIT 1";
    $result = mysqli_query($polaczenie, $sql);
    $query = mysqli_fetch_array($result);
    
    $idZlecenia = $query['idZlecenia'];

    if(!is_dir("uploads/$idKlienta/$idZlecenia")) mkdir("uploads/$idKlienta/$idZlecenia",0777, true);
    else die('Nie udało się utworzyć folderu');
    $target_dir = "uploads/$idKlienta/$idZlecenia/";
    $target_file = $target_dir.$idKlienta."_".$idZlecenia."_".($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($_FILES['fileToUpload']['size'] != 0)
    {
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "Plik nie jest zdjęciem.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Taki plik już istnieje";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Zbyt duży rozmiar pliku";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg") {
            echo "Dozwolone formaty pliku to: JPG";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Plik nie został przesłany";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<center>Plik ". basename( $_FILES["fileToUpload"]["name"]). " został przesłany.</center>";
            } else {
                echo "Podczas wysyłania pliku wystąpił błąd";
            }
        }
    }
?>