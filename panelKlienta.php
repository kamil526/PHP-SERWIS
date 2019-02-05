<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<?php
    //jezeli uzytkownik jest zalogowany, przekieruj go na index.php
    if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
        header('Location: index.php');
        //nie wykonuj kodu poniżej
        exit();
    }else{
            // jeśli nie ma jeszcze sesji "logged" i "idKlienta" to wypełniamy je domyślnymi danymi
            $_SESSION['logged'] = false;
            $_SESSION['idKlienta'] = -1;
        }
?>

    <section class="page">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-2">
                    <button class="btn btn-light" type="submit">Nowe Zlecenie</button>
                    <button class="btn btn-light" type="submit">Wszystkie Zlecenia</button>
                    <button class="btn btn-light" type="submit">Moje dane</button>
                </div>
                
                <div class="col-md-10">

                    


                </div>
            </div>

        </div>
    </section>
<?php
    include 'bottomPage.php';
    zamknijPoloczenie(); 
?>