<?php
    if ($_SESSION['logged']==false){
        header('Location: index.php');
        //nie wykonuj kodu poniżej
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

    echo $idKlienta;

    // if(!is_dir('uploads/.$idKlienta./.$idZlecenia.'))mkdir('uploads/.$idKlienta./.$idZlecenia.',0777, true);
    if(!is_dir("uploads/$idKlienta/$idZlecenia"))mkdir("uploads/$idKlienta/$idZlecenia",0777, true);
    // $target_dir = "uploads/$idKlienta/$idZlecenia/";
    $target_dir = "uploads/$idKlienta/$idZlecenia/";
    $target_file = $target_dir.$idKlienta."_".($_FILES["fileToUpload"]["name"]);
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
        // jezeli plik o takiej nazwie istnieje
        if (file_exists($target_file)) {
            echo "Taki plik już istnieje";
            $uploadOk = 0;
        }
        // maksymalna wielkosc pliku
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "byt duży rozmiar pliku";
            $uploadOk = 0;
        }
        // obługiwane typu do uploadu
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Dozwolone formaty pliku to: JPG, JPEG, PNG, GIF";
            $uploadOk = 0;
        }
        // w przypadku błedu
        if ($uploadOk == 0) {
            echo "Plik nie został przesłany";
        // upload
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<center>Plik ". basename( $_FILES["fileToUpload"]["name"]). " został przesłany.</center>";
            } else {
                echo "Podczas wysyłania pliku wystąpił błąd";
            }
        }
    }
?>