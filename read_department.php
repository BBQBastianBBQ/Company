<?php
function createTable(array $data, array|false $ueberschriften=false,string $class_1, string $class_2,string $class_3,string $class_4)
{ $length= count($data);
    echo "<table class='$class_1'>";
    echo"<tr>";

    // mit dem folgenden Loop erzeuge ich die Überschriften der Tabelle:

    foreach(array_keys($data[0]) as $x=>$y)

    {
        echo "<th class='$class_2'>","$y","</th>";
    }   echo "</tr>";

    // hier beginnt der Loop, der durch die gesamte Länge des arrays durch iteriert
    for ($i = 0; $i <= $length-1; $i++){

        // hier ist der Teil der Funktion der dafür sorgt, dass die Reihen der Tabelle unterschiedliche Farben haben:

        if ($i%2 == 0) {
            echo"<tr class='$class_3'>";}
        else
        {echo "<tr class='$class_4'>";}

        $var1=$data[$i];
        $loop=0;                // hier erzeuge ich noch eine Laufvariable, damit ich den richtigen Schlüsselwert überprüfen und abgreifen kann
        // in diesem Fall ist der benötigte Schlüsselwert die Spalte Id in der Tabelle (ich weiß, dass die Schlü.St. == [0] ist
        foreach ($var1 as $inhalt) {
            if ($loop == 0)                 // ich kann durch die Zahl eine bestimmte Stelle im Array bestimmen, die ausgewählt werden soll
                $id=$inhalt;                    // hier füge ich den wert von inhalt der benötigten Variable zu
            echo "<td>", $inhalt, "</td>";
            $loop ++;

        }
        echo "<td><a href='/delete_department.php?id=$id'>delete</a></td>";  // ?id=$id fügt dem $_GET array den Wert zu der in der Variable steht
        echo  "<td><a href='/update_department.php?id=$id'>update</a></td>";
        echo "</tr>","\n";

    }
    echo "</table>";


}
// $id=$_GET['id'];
$conn = new PDO('mysql:host=localhost;dbname=company','bstnremo','X1dl§eAA7');
$sql='SELECT * FROM Department';
$stmt = $conn->prepare($sql);
$stmt->execute();
$array=$stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="DepartmentCSS.css?v=<?php echo time(); ?>" type="text/css">

    <!-- WICHTIG: man muss für Firefox in die CSS Info eine Instanz einbauen, die dafür sorgt, dass der Browser
     nicht die im Cache gespeicherte .CSS Datei nutzt, sondern immer die neuste Version lädt, sonst werden Veränderungen
     nicht richtig angezeigt-->

</head>
<body class="body">

<div class="bodydiv">
    <div class="tablediv">
    <?php
echo (createTable($array,false,"table", "te","trow1","trow2"));
?>
    </div>
    <br>
    <div class="lynx">
<p><a href="../create_department.php">Neue Departments eingetragen</a></p>
    </div>
        <div class="lynx">
<p><a href="../ersteseite.php">zurück zur Startseite</a></p>
        </div>
</div>
</body>

</html>