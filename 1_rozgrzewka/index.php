<?php

/* Stwórz statyczną stronę z formularzem, która prosi o imię użytkownika, a po kliknięciu przycisku
 *  „wyślij” przekierowuje na podstronę witającą użytkownika słowami „Cześć {$imię}!”
Wskazówki:
    Formularz ma przekierowywać na tą samą stronę.
    Na samym początku sprawdź czy strona została wygenerowana przez zapytanie GET czy POST 
 * (użyj if i $_SERVER['REQUEST_METHOD'])
    Sprawdź czy w tablicy POST znajduje się poprawna zmienna.
    Jeżeli coś nie działa – debuguj!!! */

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userName']) &&
      trim($_POST['userName']) != '' && strlen(trim($_POST['userName'])) > 2) {
    echo "Cześć, {$_POST['userName']}!";
}

?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Zadanie 1</title>
    </head>
    <body>

        <form action="#" method="POST">

            <label>
                Wpisz swoje imię:
                <input type="text" name="userName"/>
            </label>

            <input type="submit" value="Kliknij"/>
        </form>

    </body>
</html>

