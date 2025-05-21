<?php 


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
        <p>
            <?php  ?>
        </p>
    </section>

    <main>
        <article>
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
        </article>

        <article>
            <h2>Sprawdź kto ma urodziny</h2>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="date" name="data" id="data" min="2024-01-01" max="2024-12-31" required>
                <input type="submit" value="wyślij">
            </form>
        </article>

        <article>
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
        </article>
    </main>

    <footer>
        <p>Stronę opracował(a): 12345678910</p>
    </footer>

</body>
</html>