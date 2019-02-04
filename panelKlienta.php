<?php
    include 'topPage.php';
    otworzPoloczenie();
?>

<main>
    <section class="page">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-3">
                    <button class="btn btn-light" type="submit">Nowe Zlecenie</button>
                    <button class="btn btn-light" type="submit">Wszystkie Zlecenia</button>
                    <button class="btn btn-light" type="submit">Moje dane</button>
                </div>
                
                <div class="col-md-9">
                

                    <div class="row featurette">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Marka:</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Marka pojazdu">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Model:</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Model pojazdu">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Opis usterki</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" 
                                    placeholder="Podaj szczegóówy opis usterki, na jej podstawie dokonamy wstępnej wyceny naprawy" rows="8">
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Opis zlecenia:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Rodzaj wizyty:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Reklamacja</option>
                                    <option>Gwarancja</option>
                                    <option>Naprawa</option>>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Data przekazania do naprawy:</label>
                                    <input type="date" name="bday" max="3000-12-31" 
                                            min="2019-01-01" class="form-control">    
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row featurette">
                        <div class="col-md-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="zdjecieUszkodzenia">
                                <label class="custom-file-label" for="customFile">Wybierz plik</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- back to top button -->
            <button onclick="topFunction()" id="myBtn" title="Go to top">Wróć na górę</button>
            <br>

            <hr class="featurette-divider">

            <!-- FOOTER -->
            <footer class="container">
                <div class="row">
                <p>&copy; 2018 e-Serwis &middot; <a href="startpage/data/construction.html" class="text-success">Regulamin</a></p>
            </footer>
        </div>
    </section>
</main>
<?php
    include 'bottomPage.php';
    zamknijPoloczenie(); 
?>