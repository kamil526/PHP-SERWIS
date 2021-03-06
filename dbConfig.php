<?php
    include 'config.php';
?>

<?php
    function utworz_baze() {
        $polaczenie = mysqli_connect("127.0.0.1", "root", "") or exit("Nieudane polaczenie z serwerem");
        $baza = 'serwisDatabase';
        
        echo "Tworzę bazę danych '$baza' ... <br>";
        mysqli_query($polaczenie, "CREATE DATABASE `$baza` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;") 
        or exit("Błąd w zapytaniu tworzącym bazę");
    }
    function utworzTabele() 
    {
        global $polaczenie;
        
        $rozkaz = "CREATE TABLE `Pracownicy` (
            `idPracownika` int(11) NOT NULL,
            `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
            `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
            `imie` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `nazwisko` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `email` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `typUzytkownika` int(11) DEFAULT NULL
            )";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);
        
        $rozkaz = "CREATE TABLE `Klienci` (
            `idKlienta` int(11) NOT NULL,
            `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
            `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
            `imie` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `nazwisko` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `nazwaFirmy` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `nip` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `email` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `ulica` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `nrDomu` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `miasto` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `kodPocztowy` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `telefon` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
          )";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);
        
        $rozkaz = "CREATE TABLE `Zlecenia` (
            `idZlecenia` int(11) NOT NULL,
            `idPracownika` int(11) DEFAULT NULL,
            `idKlienta` int(11) DEFAULT NULL,
            `dataDodania` date DEFAULT NULL,
            `dataPrzekazania` date DEFAULT NULL,
            `dataZakonczenia` date DEFAULT NULL,
            `statusZlecenia` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `rodzajZlecenia` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
            `opisZlecenia` varchar(500) COLLATE utf8_polish_ci DEFAULT NULL,
            `opisUsterki` varchar(500) COLLATE utf8_polish_ci DEFAULT NULL,
            `komentarzPracownika` varchar(500) COLLATE utf8_polish_ci DEFAULT NULL,
            `markaPojazdu` varchar(80) COLLATE utf8_polish_ci DEFAULT NULL,
            `modelPojazdu` varchar(80) COLLATE utf8_polish_ci DEFAULT NULL,
            `wartoscZlecenia` decimal(13,4) DEFAULT '0.0000'
          )";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkazy = array(
            "ALTER TABLE Klienci ADD PRIMARY KEY (`idKlienta`);",
            "ALTER TABLE Pracownicy ADD PRIMARY KEY (`idPracownika`);",
            "ALTER TABLE Zlecenia ADD PRIMARY KEY (`idZlecenia`), ADD KEY `idPracownika` (`idPracownika`), ADD KEY `idKlienta` (`idKlienta`);",
            "ALTER TABLE Klienci MODIFY `idKlienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;",		 
            "ALTER TABLE Pracownicy MODIFY `idPracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;",
            "ALTER TABLE Zlecenia MODIFY `idZlecenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;",
            "ALTER TABLE Zlecenia ADD CONSTRAINT `zlecenia_ibfk_1` FOREIGN KEY (`idPracownika`) REFERENCES `Pracownicy` (`idPracownika`),
                ADD CONSTRAINT `zlecenia_ibfk_2` FOREIGN KEY (`idKlienta`) REFERENCES `Klienci` (`idKlienta`);");	
	    foreach($rozkazy as $rozkaz)
		mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
    }
    function wstaw_dane_testowe()
    {
        global $polaczenie;

        $rozkaz = "INSERT INTO `Klienci` (`idKlienta`, `login`, `haslo`, `imie`, `nazwisko`, `nazwaFirmy`, `nip`, `email`, `ulica`, `nrDomu`, `miasto`, `kodPocztowy`, `telefon`) 
        VALUES (1, 'kamil', 'f3fb2d647acdb15c380e83d84a2ab19e522dae6e', 'Kamil', 'Poręba', 'COMP S.A.', '522-00-01-694', 'kporeba526@gmail.com', 'Kamionka Wielka', '123', 'Kamionka Wielka', '33-3334', '98765324')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkaz = "INSERT INTO `Klienci` (`idKlienta`, `login`, `haslo`, `imie`, `nazwisko`, `nazwaFirmy`, `nip`, `email`, `ulica`, `nrDomu`, `miasto`, `kodPocztowy`, `telefon`) 
        VALUES (2, 'michal', '823cf077628b6a5c3f995cb7045ba445e8767bb5', 'Michał', 'Sierotowicz', '', '', 'ms@gmail.com', 'Nawojowska', '44', 'Nowy Sącz', '33-300', '123431232')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkaz = "INSERT INTO `Klienci` (`idKlienta`, `login`, `haslo`, `imie`, `nazwisko`, `nazwaFirmy`, `nip`, `email`, `ulica`, `nrDomu`, `miasto`, `kodPocztowy`, `telefon`) 
        VALUES (3, 'test', '30563efa0a3e89f8528509eaa048a5d82a9d9a4b', 'Jan', 'Kowalski', 'Kowalski Sp. j.', '7778899444', 'jkowal@op.pl', 'Szeroka', '1', 'Nowy Sącz', '33-300', '666777888')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);


        $rozkaz = "INSERT INTO `Pracownicy` (`idPracownika`, `login`, `haslo`, `imie`, `nazwisko`, `email`, `typUzytkownika`) 
        VALUES (1, 'admin', 'c40532c192bf6ebd0ae0c8d6b1f4d08feeb11740', 'Administrator', 'Admin E-Serwis', 'admin@e-Serwis.pl', 1)";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkaz = "INSERT INTO `Pracownicy` (`idPracownika`, `login`, `haslo`, `imie`, `nazwisko`, `email`, `typUzytkownika`) 
        VALUES (2, 'test', '30563efa0a3e89f8528509eaa048a5d82a9d9a4b', 'Jan', 'Kowalski', 'jkowal@op.pl', 0)";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);
        
        $rozkaz = "INSERT INTO `Zlecenia` (`idZlecenia`, `idPracownika`, `idKlienta`, `dataDodania`, `dataPrzekazania`, `dataZakonczenia`, `statusZlecenia`, `rodzajZlecenia`, `opisZlecenia`, `opisUsterki`, `komentarzPracownika`, `markaPojazdu`, `modelPojazdu`, `wartoscZlecenia`) 
        VALUES (1, 1, 1, '2019-02-08', '2019-02-08', '2019-02-08', 'Zakończone', 'Przegląd okresowy', 'Przegląd okresowy 20. tyś km', 'Brak usterek', 'Wymieniono olej silnikowy, oraz komplet filtrów', 'Ford', 'Kuga', '199.9900')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkaz = "INSERT INTO `Zlecenia` (`idZlecenia`, `idPracownika`, `idKlienta`, `dataDodania`, `dataPrzekazania`, `dataZakonczenia`, `statusZlecenia`, `rodzajZlecenia`, `opisZlecenia`, `opisUsterki`, `komentarzPracownika`, `markaPojazdu`, `modelPojazdu`, `wartoscZlecenia`) 
        VALUES (2, 1, 2, '2019-02-08', '2019-02-15', '2019-02-16', 'Oczekiwanie', ' Naprawa Gwarancyjna', 'Weryfikacja turbo', 'Spadek mocy', ' Oczekiwanie na części', 'Ford', 'Focus', '0.0000')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkaz = "INSERT INTO `Zlecenia` (`idZlecenia`, `idPracownika`, `idKlienta`, `dataDodania`, `dataPrzekazania`, `dataZakonczenia`, `statusZlecenia`, `rodzajZlecenia`, `opisZlecenia`, `opisUsterki`, `komentarzPracownika`, `markaPojazdu`, `modelPojazdu`, `wartoscZlecenia`) 
        VALUES (3, 1, 2, '2019-02-08', '2019-02-09', '2019-02-10', 'Oczekiwanie', 'Przegląd', 'Stuki w przednim zawieszeniu', 'Wybite zawieszenie', ' ', 'Toyota', 'CRV', '0.0000')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

        $rozkaz = "INSERT INTO `Zlecenia` (`idZlecenia`, `idPracownika`, `idKlienta`, `dataDodania`, `dataPrzekazania`, `dataZakonczenia`, `statusZlecenia`, `rodzajZlecenia`, `opisZlecenia`, `opisUsterki`, `komentarzPracownika`, `markaPojazdu`, `modelPojazdu`, `wartoscZlecenia`) 
        VALUES (4, 1, 1, '2019-02-08', '2019-02-08', '2019-02-08', 'Wycena', 'Usługa pogwarancyjna', 'Wymiana rozrządu', 'Brak', '', 'Mazda', 'cx6', '0.0000')";
        mysqli_query($polaczenie, $rozkaz)
        or exit("Błąd w zapytaniu: ".$rozkaz);

    }
?>

<?php
    utworz_baze();
    otworzPoloczenie();
    utworzTabele();
    wstaw_dane_testowe();
    zamknijPoloczenie();
    header('Location: index.php');
?>