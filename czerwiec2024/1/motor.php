<?php

$conn = mysqli_connect('localhost', 'root', '', 'motory1');
if (!$conn)
    echo ("Nie udało się połączyć z bazą danych: " . mysqli_connect_error());

$query1 = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo
FROM wycieczki
JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id";
$wycieczki = mysqli_query($conn, $query1);


$query2 = "SELECT COUNT(wycieczki.id)
FROM wycieczki";
$ilosc_wycieczek = mysqli_fetch_row(mysqli_query($conn, $query2));

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <img src="motor.png" alt="motocykl" id="motor-png">

    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>

    <main>
        <section class="glowna">
            <h2>Gdzie pojechać?</h2>
            <dl>
                <?php while ($row = mysqli_fetch_row($wycieczki)): ?>
                    <dt>"<?= $row[0] ?>, rozpoczyna się w <?= $row[2] ?>", <a href="<?= $row[3] ?>.jpg">zobacz zdjęcie</a> </dt>
                    <dd><?= $row[1] ?></dd>
                <?php endwhile; ?>
            </dl>
        </section>

        <section class="boczna">
            <aside>
                <h2>Co kupic?</h2>
                <ol>
                    <li>Honda CBR125R</li>
                    <li>Yamaha YBR125</li>
                    <li>Honda VFR800i</li>
                    <li>Honda CBR1100XX</li>
                    <li>BMW R1200GS LC</li>
                </ol>
            </aside>

            <aside>
                <h2>Statystyki</h2>
                <p>Wpisanych wycieczek: <?= $ilosc_wycieczek[0] ?></p>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>
            </aside>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: 12345678910</p>
    </footer>

</body>

</html>