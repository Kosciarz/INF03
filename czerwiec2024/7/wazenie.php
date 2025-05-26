<?php

$conn = mysqli_connect('localhost', 'root', '', 'wazenietirow');

$zapytanie1 = "SELECT lokalizacje.ulica
            FROM lokalizacje";
$lokalizacje = mysqli_query($conn, $zapytanie1);

$zapytanie2 = "SELECT wagi.rejestracja, wagi.waga, wagi.dzien, wagi.czas, lokalizacje.ulica
            FROM wagi
            JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id
            WHERE wagi.waga > 5
            ORDER BY wagi.czas";
$wazenia = mysqli_query($conn, $zapytanie2);

$zapytanie3 = "INSERT INTO wagi(wagi.lokalizacje_id, wagi.waga, wagi.rejestracja, wagi.dzien, wagi.czas)
            VALUES (5, FLOOR(RAND() * 10 + 1), 'DW12345', CURRENT_DATE(), CURRENT_TIME())";
mysqli_query($conn, $zapytanie3);
header('Refresh: 10');

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>

    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
    <section>
        <header>
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </header>

        <header>
            <img src="obraz1.png" alt="waga">
        </header>
    </section>

    <main>
        <article>
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php while ($ulica = mysqli_fetch_row($lokalizacje)): ?>
                    <li>ulica <?= $ulica[0] ?></li>
                <?php endwhile; ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </article>

        <article>
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php while ($wazenie = mysqli_fetch_row($wazenia)): ?>
                    <tr>
                        <td><?= $wazenie[0] ?></td>
                        <td><?= $wazenie[4] ?></td>
                        <td><?= $wazenie[1] ?></td>
                        <td><?= $wazenie[2] ?></td>
                        <td><?= $wazenie[3] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </article>

        <article>
            <img src="obraz2.jpg" alt="tir">
        </article>
    </main>

    <footer>
        <p>Stronę wykonał: 0000000000</p>
    </footer>

</body>
</html>