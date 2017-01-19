<?php

/* Stwórz aplikację która będzie służyć do trzymania prostej listy zadań. Strona ma pokazywać 
 * wszystkie zadania do zrobienia, i formularz do dodania zadania.
Wskazówki:
    Korzystaj z sesji do trzymania zadań.
    Zadania trzymaj w tabelce.
    Jeżeli strona jest generowania przez POST to dodaj zadanie.
    Do trzymania zadań w ciasteczku użyj funkcje serialize, a do wczytania unserialize. */

session_start();

$tasks = [];

if (isset($_SESSION['tasks'])) {
    $tasks = unserialize($_SESSION['tasks']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task']) && $_POST['task'] != '') {
    $tasks[] = $_POST['task'];
    $_SESSION['tasks'] = serialize($tasks);
}

?>




<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <title>Zadanie 4</title>
    </head>
    <body>

        <form method="POST">
            <label>Wpisz zadanie:</label> <input type="text" size="60" name="task"/> 
            <input type="submit" value="Dodaj nowe zadanie" />
        </form> <br/>
        
<?php
echo "<h3>Lista dodanych zadań:</h3>";
echo "<table border = 5px;>"; 

foreach ($tasks as $task) {
    echo "<tr><td>" . $task . "</td></tr>";
    }

echo "</table>";
?>

    </body>
</html>