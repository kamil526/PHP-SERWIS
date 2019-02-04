<?php
    include 'topPage.php';
?>
    <section class="page">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-3">
                    <button class="btn btn-light" type="submit">Nowe Zlecenie</button>
                    <button class="btn btn-light" type="submit">Wszystkie Zlecenia</button>
                    <button class="btn btn-light" type="submit">Moje dane</button>
                </div>            
                    <div class="col-md-9">
                    <form>
                        <div class="row featurette">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="inputAddress">Marka:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Marka pojazdu">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Model:</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Model pojazdu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Opis usterki:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" 
                                    placeholder="Tutaj szczegółowo usterkę pojazdu, na jej podstawie, oszacujemy koszt naprawy" rows="8"></textarea>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Opis zlecenia:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" 
                                    placeholder="Tutaj opisz na czym ma polgać zlecenie" rows="6"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Data przekazania pojazdu:</label>
                                    <input type="date" name="dataPrzekazaniaPojazdu" max="3000-12-31" 
                                            min="2019-01-01" class="form-control">    
                                </div>
                            </div>
                        </div>

                        <div class="row featurette">
                            <div class="col-md-10">
                                <label>Tutaj możesz dołączyć zdjęcie lub inny dokument dotyczący zlecenia:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="zdjecieUszkodzenia">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>          
<?php
    include 'bottomPage.php';
?>  