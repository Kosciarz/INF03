<?php

$conn = mysqli_connect('localhost', 'root', '', 'kupauto1');

$query1 = "SELECT samochody.model, samochody.rocznik, samochody.przebieg, samochody.paliwo, samochody.cena, samochody.zdjecie
FROM samochody
WHERE samochody.id = 10";
$result1 = mysqli_query($conn, $query1);
$oferta_dnia = mysqli_fetch_row($result1);

$query2 = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie
FROM marki
JOIN samochody ON marki.id=samochody.marki_id
WHERE samochody.wyrozniony=1
LIMIT 4";
$oferty = mysqli_query($conn, $query2);

$query3 = "SELECT marki.nazwa
FROM marki";
$marki = mysqli_query($conn, $query3);

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['marka'])) {
    $wybrana_marka = $_POST['marka'];
    $query4 = "SELECT marki.nazwa, samochody.model, samochody.cena, samochody.zdjecie
    FROM samochody
    JOIN marki ON samochody.marki_id=marki.id
    WHERE marki.nazwa='$wybrana_marka'";

    $wybrane_samochody = mysqli_query($conn, $query4);
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>

    <main>
        <div class="blok1">
            <img src="<?= $oferta_dnia[5] ?>" alt="oferta dnia">
            <h4>Oferta Dnia: Toyota <?= $oferta_dnia[0] ?></h4>
            <p>Rocznik: <?= $oferta_dnia[1] ?>, przebieg: <?= $oferta_dnia[2] ?>, rodzaj paliwa: <?= $oferta_dnia[3] ?></p>
            <h4>Cena: <?= $oferta_dnia[4] ?></h4>
        </div>
        <div class="blok2">
            <h2>Oferty Wyróżnione</h2>
            <div class="oferty">
                <?php while ($row = mysqli_fetch_row($oferty)): ?>
                    <div class="oferta">
                        <img src="<?= $row[4] ?>" alt="<?= $row[1] ?>">
                        <h4><?= $row[0] . ' ' . $row[1] ?></h4>
                        <p>Rocznik: <?= $row[2] ?></p>
                        <h4><?= $row[3] ?></h4>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="blok3">
            <h2>Wybierz markę</h2>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <select name="marka" id="marka">
                    <?php while ($marka = mysqli_fetch_row($marki)): ?>
                        <option value="<?= $marka[0] ?>"><?= $marka[0] ?></option>
                    <?php endwhile; ?>
                </select>
                <input type="submit" value="Wyszukaj">
            </form>
            <div class="oferty">
                <?php while ($wybrany = mysqli_fetch_row($wybrane_samochody)): ?>
                    <div class="oferta">
                        <img src="<?= $wybrany[3] ?>" alt="<?= $wybrany[1] ?>">
                        <h4><?= $wybrany[0] . ' ' . $wybrany[1] ?></h4>
                        <h4><?= $wybrany[2] ?></h4>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>

    <footer>
        <p>Stronę wykonał: 12345678912</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>

</html>