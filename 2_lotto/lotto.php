<?php

/* Napisz prosty symulator Lotto. Symulator ma się składać z strony z formularzem który pozwoli 
 * wybrać 6 liczb z zakresu 1-49. Po wysłaniu formularza strona ma sama wylosować 6 (różnych)
 *  liczb z tego samego zakresu, wyświetlić je i pokazać ile liczb z wybranych przez użytkownika
 *  pokrywa się z wylosowanymi.
Wskazówki:
    Wygeneruj formularz pętlą for i checkboxami.
    Napisz funkcję która generuje 6 losowych liczb z podanego zakresu. Najprostszym sposobem 
 * generowania 6 różnych liczb z podanego zakresu jest stworzenie tablicy z liczbami z tego zakresu,
 *  następnie przetasowanie jej i wybranie 6 pierwszych liczb znajdujących się w tej tablicy. 
 * Funkcje które Ci pomogą: array_key_exists, shuffle, array_slice, range.
    Jeżeli strona jest wygenerowana z post – zobacz czy przesyłaś sobie wszystkie dane. Możesz 
 * zrobić to za pomocą var_dump($_POST);  */

$numbersMessage = '';
$userNumbersMessage = '';

if ($_SERVER['REQUEST_METHOD'] = "POST") {

    function randomDrum($start = 1, $stop = 49) {
        $numbers_1_49 = range($start, $stop); //tworzy tablicę z zakresu 1-49, tu z krokiem domyslnym +1
        shuffle($numbers_1_49);  //przetasowanie elementów w tablicy
        $randomNumbers = array_slice($numbers_1_49, 0, 6); //wycięcie 6 elementów bez przesunięcia, czyli od poczatku
        return $randomNumbers;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && @count($_POST['checkbox'] == 6)) {
        $luckyNumbers = randomDrum();
        
        if (in_array(@$_POST['checkbox'], $luckyNumbers)) {
            $numbersMessage = "<h3>Wygrałeś</h3>" . implode(',', $luckyNumbers);
        } else {
            $userNumbersMessage = "Nie wygrałeś, twoje liczby to: " . @implode(',', @$_POST['checkbox']);
            $numbersMessage = "Wylosowane liczby to: " . implode(',', $luckyNumbers);
        }
    }
}

?>

<html>
    <head>
        <title>zadanie 2</title>
    </head>
    <body>

        <?php echo $numbersMessage ?> <br>
        <?php echo $userNumbersMessage ?>
        <form action="#" method="POST">
            <pre>
                <?php
                for ($i = 1; $i <= 49; $i++) {
                    echo "<input type='checkbox' name='checkbox[]' value='$i'/><label>$i</label>";
                    if (!($i % 10)) {
                        echo "<br>";
                    }
                }
                echo "<br><input type='submit' value='Kliknij i sprawdź'></input>";
                ?>
            </pre>                 
        </form>

    </body>
</html>

