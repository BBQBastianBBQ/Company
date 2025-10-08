<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    ?>

    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="DepartmentCSS.css?v=<?php echo time(); ?>" type="text/css">

        <!-- WICHTIG: man muss für Firefox in die CSS Info eine Instanz einbauen, die dafür sorgt, dass der Browser
         nicht die im Cache gespeicherte .CSS Datei nutzt, sondern immer die neuste Version lädt, sonst werden Veränderungen
         nicht richtig angezeigt-->

    </head>
    <body class='body'>

    <h1> NEUE DEPARTMENTS ERSTELLEN</h1><br>

    <div class='form'>
        <form action='' method='post'>
            <input type="text" name="name"placeholder="Department">
            <p>Hiring? <input type="checkbox" name="yes[]" value="1" /></p>
            <input type="submit" value="abschicken">


        </form>
    </div>
    <p><a href="../read_department.php">hier geht es zur Tabelle</a></p>
    <br>
    <p><a href="http://www.bastian.web.bbq/index.php">hier gehts zurück zu meiner Seite</a></p>

    </body>
    </html>
    <?Php

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $hire = (int)$_POST['yes'];
    if ( $hire == 1)
    {$hire=1;}
    else{
        $hire=0;
    }

    $conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
    $stmt = $conn->prepare("INSERT INTO Department(name,hiring) VALUES(:name,:hiring)"); // die bindParam-Methode wird initiiert
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':hiring', $hire);
    // es wird dafür gesorgt, dass keine SQL-Injektion o.Ä. stattfinden kann, da
                                                    // alles immer in einen SQL-String umgewandelt wird, was von FORM kommt
    $stmt->execute();
    ?>
<html>
<head>
    <meta charset="UTF-8" <!--http-equiv="refresh" content="0; url= create_department.php"-->>
</head>
    <body><?php


var_dump($_POST["yes"]);

?></body>


</html> <?php
}

var_dump($_POST["yes"]);

?>


