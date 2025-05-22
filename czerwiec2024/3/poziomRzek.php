<?php

$conn = mysqli_connect('localhost', 'root', '', 'rzeki');
if (!$conn) {
    exit("Nie udało się połączyć z bazą danych: " . mysqli_connect_error());
}

$wynik;

if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['stan_rzek'])) {
    $stan_rzek = $_POST['stan_rzek'];
    if ($stan_rzek === "wszystkie") {
        $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy,      pomiary.stanWody
                    FROM wodowskazy
                    JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id
                    WHERE pomiary.dataPomiaru = '2022-05-05'";

        $wynik = mysqli_query($conn, $zapytanie);
    } elseif ($stan_rzek === "ostrzegawczy") {
        $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody
                    FROM wodowskazy
                    JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id
                    WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy";

        $wynik = mysqli_query($conn, $zapytanie);
    } elseif ($stan_rzek === "alarmowy") {
        $zapytanie = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody
                    FROM wodowskazy
                    JOIN pomiary ON pomiary.wodowskazy_id = wodowskazy.id
                    WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy";

        $wynik = mysqli_query($conn, $zapytanie);
    }
}



mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziom rzek</title>

    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <header>
        <div class="blok-banera">
            <img src="obraz1.png" alt="Mapa Polski">
        </div>

        <div class="blok-banera">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </div>
    </header>

    <nav>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="radio" name="stan_rzek" id="wszystkie" value="wszystkie">
            <label for="wszystkie">Wszystkie</label>

            <input type="radio" name="stan_rzek" id="ostrzegawczy" value="ostrzegawczy">
            <label for="ostrzegawczy">Ponad stan ostrzegawczy</label>

            <input type="radio" name="stan_rzek" id="alarmowy" value="alarmowy">
            <label for="alarmowy">Ponad stan alarmowy</label>

            <input type="submit" value="Pokaż">
        </form>
    </nav>

    <main>
        <article class="lewy">
            <h3>Stany na dzień 2022-05-05</h3>

            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>

                <?php while ($stan_rzeki = mysqli_fetch_row($wynik)): ?>
                    <tr>
                        <td><?= $stan_rzeki[0] ?></td>
                        <td><?= $stan_rzeki[1] ?></td>
                        <td><?= $stan_rzeki[2] ?></td>
                        <td><?= $stan_rzeki[3] ?></td>
                        <td><?= $stan_rzeki[4] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </article>

        <article class="prawy">
            <h3>Informacje</h3>

            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>

            <h3>Średnie stany wód</h3>

            <?php ?>

            <?php ?>

            <a href="https://komunikaty.pl">Dowiedz się więcej</a>

            <img src="obraz2.jpg" alt="rzeka">
        </article>
    </main>

    <footer>
        <p>Stronę wykonał: 12345678910</p>
    </footer>

</body>

</html>