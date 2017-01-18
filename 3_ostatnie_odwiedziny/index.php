<?php

/* Stwórz stronę, która wita gości i mówi im kiedy ostatnio byli na naszej stronie. 
 * Daj też możliwość usunięcia ciasteczka (poprzez guzik).
Wskazówki:
    Korzystaj z ciasteczek do zapisania danych kiedy user był na stronie.
    Uzależnij komunikat od istnienia ciasteczka (podczas pierwszych odwiedzin strony wyświetl 
 * odpowiedni komunikat).
    Usuwanie ciasteczka zrób na osobnej stronie. */

if (isset($_COOKIE['lastDate'])) {
    $lastVisit = $_COOKIE['lastDate'];
    setcookie('lastDate', date("Y-m-d H:i:s"));
    $_COOKIE['lastDate'] = date("Y-m-d H:i:s");
    $messageForUser = "Ostatnio byłeś tu o: " . $lastVisit;
} else {
    setcookie('lastDate', date("Y-m-d H:i:s"));
    $messageForUser = "Jesteś tu po raz pierwszy";
}

?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Zadanie 3</title>
    </head>

    <body>
        <h3><?= $messageForUser ?></h3>

        <a href="delete_cookie.php">Usuń ciasteczko</a>
    </body>

</html>

