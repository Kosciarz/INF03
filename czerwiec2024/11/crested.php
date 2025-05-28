<?php

$conn = mysqli_connect('localhost', 'root', '', 'hodowla');

$zapytanie1 = "SELECT rasy.rasa
        FROM rasy";
$rasy = mysqli_query($conn, $zapytanie1);

$zapytanie2 = "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa
            FROM swinki
            JOIN rasy ON swinki.rasy_id = rasy.id
            WHERE rasy.id = 7";
$glowna_swinka = mysqli_fetch_row(mysqli_query($conn, $zapytanie2));

$zapytanie3 = "SELECT swinki.imie, swinki.cena, swinki.opis
            FROM swinki
            JOIN rasy ON swinki.rasy_id = rasy.id
            WHERE rasy.id = 7";
$swinki = mysqli_query($conn, $zapytanie3);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>

    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>

    <section>
        <article>
            <nav>
                <a href="peruwianka.php">Rasa Peruwianka</a>
                <a href="american.php">Rasa American</a>
                <a href="crested.php">Rasa Crested</a>
            </nav>
            
            <main>
                <img src="crested.jpg" alt="Świnka morska rasy peruwianka">
                <h2>Rasa: <?= $glowna_swinka[2] ?></h2>
                <p>Data urodzenia: <?= $glowna_swinka[0] ?></p>
                <p>Oznaczenie miotu: <?= $glowna_swinka[1] ?></p>

                <hr>
                <h2>Świnki w tym miocie</h2>

                <?php while ($swinka = mysqli_fetch_row($swinki)): ?>
                    <h3><?= $swinka[0] ?> - <?= $swinka[1] ?> zł</h3>
                    <p><?= $swinka[2] ?></p>
                <?php endwhile; ?>
            </main>
        </article>

        <article>
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php while ($rasa = mysqli_fetch_row($rasy)): ?>
                    <li><?= $rasa[0] ?></li>
                <?php endwhile; ?>
            </ol>
        </article>
    </section>

    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>

</body>
</html>