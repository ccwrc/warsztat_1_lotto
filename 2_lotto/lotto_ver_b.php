<?php

/* Rozszerz symulator z poprzedniego zadania. Ma on przyjmować w postaci danych GET informacje 
 * na temat rozpiętości liczb (np. ?start=5&end=30) i działać dla podanego przedziału. 
 * Czyli możemy zrobić lotto gdzie liczby są losowane z przedziału 5-30. */

$start = (trim(@$_GET['start']) != '') ? $_GET['start'] : 1; //operator trójargumentowy
$stop = (trim(@$_GET['stop']) != '') ? $_GET['stop'] : 49;
$message = '';


function randomDrum($start = 1, $stop = 49) {
    $numbers_1_49 = range($start, $stop); //tworzy tablicę z zakresu 1-49, tu z krokiem domyslnym +1
    shuffle($numbers_1_49);  //przetasowanie elementów w tablicy
    $randomNumbers = array_slice($numbers_1_49, 0, 6); //wycięcie 6 elementów bez przesunięcia, czyli od poczatku
    return $randomNumbers;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($_POST['numbers']) == 6) {
    $randomNumbers = randomDrum($start, $stop);
    $pigsFly = true;

    foreach ($_POST['numbers'] as $number) {
        if (!in_array($number, $randomNumbers)) {
            $pigsFly = false;
        }
    }

    if ($pigsFly) {
        $message = "<h3>Wygrałeś! Wylosowane liczby: " . implode(",", $_POST['numbers']) . "</h3>";
    } else {
        $message = "<h3>Staraj się dalej...</h3>";
        $message.= "Twoje liczby to: " . implode(', ', $_POST['numbers']) . "<br>";
        $message.= "Wylosowane liczby to: " . implode(', ', $randomNumbers);
    }
}

?>

<html>
    <head>
        <title>zadanie 2b</title>
    </head>       
    <body>
        <?= $message ?>
        <hr/>

        <form>    
            Liczby od
            <input type='text' name="start" value="<?= $start ?>"/>
            do 
            <input type='text' value="<?= $stop ?>" name="stop"/> 
            <input type="submit" value="Zatwierdź"/>     
        </form>
        
        <form method="POST">
            <label>Liczby</label><br>

            <?php for ($i = $start; $i <= $stop; $i++) { ?>
                <input type="checkbox" name ="numbers[]" value="<?= $i ?>"/> <?= $i ?>

            <?php } ?>

            <br>
            <input type="submit" value="Wylosuj">
        </form>

    </body>
</html>
