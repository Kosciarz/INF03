<?php 

$conn = mysqli_connect('localhost', 'root', '', 'kalendarz');
if (!$conn) {
    exit("Nie udało połączyć się z bazą danych: " . mysqli_connect_error());
}

$dni_tygodnia = [
    1 => "poniedziałek",
    2 => "wtorek",
    3 => "środa",
    4 => "czwartek",
    5 => "piątek",
    6 => "sobota",
    7 => "niedziela",
];

$dzisiejsza_pelna_data = date("d-m-Y");
$dzisiejsza_data = date("m-d", time());
$dzien_tygodnia = $dni_tygodnia[date("w")];
$query1 = "SELECT imieniny.imiona
        FROM imieniny
        WHERE imieniny.data = '$dzisiejsza_data'";

$dzisiejsze_imieniny = mysqli_fetch_row(mysqli_query($conn, $query1));

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['data'])) {
    $dzien = substr($_POST['data'], 8);
    $miesiac = substr($_POST['data'], 5, 2);
    $wybrana_data = $miesiac . "-" . $dzien;

    $query2 = "SELECT imieniny.imiona
            FROM imieniny
            WHERE imieniny.data = '$wybrana_data'";
    $wybrane_imieniny = mysqli_fetch_row(mysqli_query($conn, $query2));
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>

    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>

    <section>
        <p>Dzisiaj jest <?= $dzien_tygodnia ?>, <?= $dzisiejsza_pelna_data ?>, imieniny: <?= implode($dzisiejsze_imieniny) ?></p>
    </section>

    <main>
        <aside id="lewy">
            <table>
                <tr>
                    <th>liczba dni</th>
                    <th>miesiąc</th>
                </tr>
                <tr>
                    <td rowspan="7">31</td>
                    <td>styczeń</td>
                </tr>
                <tr>
                    <td>marzec</td>
                </tr>
                <tr>
                    <td>maj</td>
                </tr>
                <tr>
                    <td>lipiec</td>
                </tr>
                <tr>
                    <td>sierpień</td>
                </tr>
                <tr>
                    <td>październik</td>
                </tr>
                <tr>
                    <td>grudzień</td>
                </tr>
                <tr>
                    <td rowspan="4">30</td>
                    <td>kwiecień</td>
                </tr>
                <tr>
                    <td>czerwiec</td>
                </tr>
                <tr>
                    <td>wrzesień</td>
                </tr>
                <tr>
                    <td>listopad</td>
                </tr>
                <tr>
                    <td>28 lub 29</td>
                    <td>luty</td>
                </tr>
            </table>
        </aside>

        <article>
            <h2>Sprawdź kto ma urodziny</h2>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="date" name="data" id="data" min="2024-01-01" max="2024-12-31" required>
                <input type="submit" value="wyślij">
            </form>

            Dnia <?= $_POST['data'] ?> są imieniny: <?= implode($wybrane_imieniny) ?>
        </article>

        <aside id="prawy">
            <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów">
                <img src="kalendarz.gif" alt="Kalendarz Majów">
            </a>
            <h2>Rodzaje kalendarzy</h2>
            <ol>
                <li>
                    słoneczny
                    <ul>
                        <li>kalendarze Majów</li>
                        <li>juliański</li>
                        <li>gregoriański</li>
                    </ul>
                </li>
                <li>
                    księżycowy
                    <ul>
                        <li>starogrecki</li>
                        <li>babiloński</li>
                    </ul>
                </li>
            </ol>
        </aside id="prawy">
    </main>

    <footer>
        <p>Stronę opracował(a): 12345678910</p>
    </footer>

</body>
</html>