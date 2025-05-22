<?php

$conn = mysqli_connect('localhost', 'root', '', 'galeria');
if (!$conn)
    die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error());

$query1 = "SELECT zdjecia.plik, zdjecia.tytul, zdjecia.polubienia, autorzy.imie, autorzy.nazwisko
FROM zdjecia
JOIN autorzy ON autorzy.id = zdjecia.autorzy_id
ORDER BY autorzy.nazwisko";
$zdjecia = mysqli_query($conn, $query1);

$query2 = "SELECT zdjecia.tytul, zdjecia.plik
FROM zdjecia
WHERE zdjecia.polubienia >= 100";
$najbardziej_lubiane = mysqli_fetch_row(mysqli_query($conn, $query2));

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>

    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <header>
        <h1>Tematy zdjęć</h1>
    </header>

    <main>
        <aside>
            <h2>Tematy zdjęć</h2>

            <ul>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ul>
        </aside>

        <article>

            <?php while ($zdjecie = mysqli_fetch_row($zdjecia)): ?>
                <div class="zdjecie">
                    <img src="<?= $zdjecie[0] ?>" alt="zdjęcie">
                    <h3><?= $zdjecie[1] ?></h3>

                    <?php if ($zdjecie[2] > 40): ?>
                        <p>Autor: <?= $zdjecie[3] ?> <?= $zdjecie[4] ?>. Wiele osób polubiło ten obraz</p>
                    <?php else: ?>
                        <p>Autor: <?= $zdjecie[3] ?> <?= $zdjecie[4] ?>.</p>
                    <?php endif; ?>

                    <a href="<?= $zdjecie[0] ?>" download>Pobierz</a>
                </div>
            <?php endwhile; ?>

        </article>

        <aside>
            <h2>Najbardziej lubiane</h2>

            <img src="<?= $najbardziej_lubiane[1] ?>" alt="<?= $najbardziej_lubiane[0] ?>">

            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </aside>
    </main>

    <footer>
        <p>Stronę wykonał: 12345678910</p>
    </footer>

</body>

</html>