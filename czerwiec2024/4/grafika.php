<?php

$conn = mysqli_connect('localhost', 'root', '', 'galeria1');

if (!$conn)
    die("Nie udało się połączyć z bazą danych: " . mysqli_connect_error());

// $query1 = "";
// $result1 = mysqli_query($conn, $query1);


// $query2 = "";
// $result2 = mysqli_query($conn, $query2);



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
        <h1>Zdjęcia</h1>
    </header>

    <main>

        <aside>
            <h2>Tematy zdjęć</h2>

            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ol>
        </aside>


        <article>

            

        </article>

        <aside>
            <h2>Najbardziej lubiane</h2>

            

            <strong>Zobacz wszystkie nasze zdjęcia</strong>
        </aside>

    </main>

    <footer>
        <h5>Stronę wykonał: 12345678910</h5>
    </footer>

</body>

</html>