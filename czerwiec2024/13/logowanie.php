<?php

$conn = mysqli_connect('localhost', 'root', '', 'psy');

$wynik = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['login']) || empty($_POST['haslo']) || empty($_POST['powtorz-haslo'])) {
        $wynik = 'wypełnij wszystkie pola';
    } else {
        $login = $_POST['login'];
        $zapytanie1 = "SELECT uzytkownicy.login
                    FROM uzytkownicy
                    WHERE uzytkownicy.login = '$login'";

        if (!empty(mysqli_fetch_row(mysqli_query($conn, $zapytanie1)))) {
            $wynik = 'login występuje w bazie danych, konto nie zostało dodane';
        } else {
            if ($_POST['haslo'] !== $_POST['powtorz-haslo']) {
                $wynik = 'hasła nie są takie same, konto nie zostało dodane';
            } else {
                $zaszyfrowanie_haslo = sha1($_POST['haslo']);
                $zapytanie2 = "INSERT INTO uzytkownicy (uzytkownicy.login, uzytkownicy.haslo)
                            VALUES ('$login', '$zaszyfrowanie_haslo')";
                
                mysqli_query($conn, $zapytanie2);
                $wynik = 'Konto zostało dodane';
            }
        }
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>

    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    
    <header>
        <h1>Forum o psach</h1>
    </header>

    <main>
        <section>
            <img src="obraz.jpg" alt="foksterier">
        </section>

        <section>
            <article>
                <h2>Zapisz się</h2>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div>
                        <label for="login">login: </label>
                        <input type="text" name="login" id="login">
                    </div>

                    <div>
                        <label for="haslo">hasło: </label>
                        <input type="password" name="haslo" id="haslo">
                    </div>

                    <div>
                        <label for="powtorz-haslo">powtórz hasło: </label>
                        <input type="password" name="powtorz-haslo" id="powtorz-haslo">
                    </div>

                    <input type="submit" value="Zapisz">
                </form>
                <p id="wynik">
                    <?= $wynik ?>
                </p>
            </article>

            <article>
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </article>

        </section>
    </main>

    <footer>
        Stronę wykonał: 00000000000
    </footer>

</body>
</html>