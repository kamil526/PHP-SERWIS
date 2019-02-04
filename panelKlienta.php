<?php
    include 'topPage.php'; 
    include 'config.php';
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
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Marka</label>
                                    <select name="marka" id="marka">
                                    <option value="">-</option>
                                    <option value="1">Ford</option>
                                    <option value="2">Peugeot</option>
                                    <option value="3">Volvo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Model</label>
                                    <select name="model" id="category">
                                    <option value="">-</option>
                                    <option value="10" >Focus</option>
                                    <option value="11" >Kuga</option>
                                    <option value="12" >Mondeo</option>
                                    <option value="20" >407</option>
                                    <option value="21" >508</option>
                                    <option value="22" >Partner</option>
                                    <option value="30" >V40</option>
                                    <option value="31" >XC-60</option>
                                    <option value="32" >V60</option>
                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Opis usterki</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-5">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Opis zlecenia:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Etap realizacji:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Przyjęto zlecenie</option>
                                    <option>W trakcie realizacji</option>
                                    <option>Zrealizowano</option>>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Data zakończenia:</label>
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