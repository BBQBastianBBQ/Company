<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="http://www.bastian.web.bbq/mystyle.css?v=<?php echo time(); ?>" type="text/css">

        <!-- WICHTIG: man muss für Firefox in die CSS Info eine Instanz einbauen, die dafür sorgt, dass der Browser
         nicht die im Cache gespeicherte .CSS Datei nutzt, sondern immer die neuste Version lädt, sonst werden Veränderungen
         nicht richtig angezeigt-->

    </head>

    <body class='body'>

    <h1> NEUE DEPARTMENTS ERSTELLEN</h1><br>

    <div class='form'>
        <form action='' method='post'>
            <input type="text" name="name"placeholder="Department">

            <input type="submit" value="abschicken">
        </form>
    </div>
    <p><a href="../read_department.php">hhier geht es zur Tabelle</a></p>
    <br>
    <p><a href="http://www.bastian.web.bbq/index.php">hier gehts zurück zu meiner Seite</a></p>

    </body>
    </html>
    <?php
}


elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_GET['id'];
    $name = $_POST['name'];

    $conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
    $sql2 = 'UPDATE Department SET name=:name  WHERE id=:id';
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':name', $name);

    $stmt->execute();
}
?>
