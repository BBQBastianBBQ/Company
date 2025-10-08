<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id=$_GET['id'];
    $conn = new PDO('mysql:host=localhost;dbname=company','bstnremo','X1dl§eAA7');
    $sql='SELECT * FROM Department WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);

    /* ich muss im Code berücksichtigen, dass ein Update auch ohne Änderung des Namens vollzogen werden könnte.
       Für diesen Fall muss ich dafür sorgen, dass ich die aktuellen Werte in der Tabelle berücksichtige.
       Diese Situation lässt sich dadurch lösen, dass ich ein Array ($result)erzeuge, in dem ich alle Werte, die ich im $sql
       Statement anfordere speicher.
       In "<form>" kann ich dann diese Werte als Default setzen und in das $_POST Array übertragen, wenn "submit" ausgelöst wird
       und keine Namens-Aktualisierung stattfindet! */


    var_dump($result);
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

    <body class='body'>

    <div class="bodydiv">
    <h1> DEPARTMENT UPDATEN</h1><br>

    <div class='form'>
        <form action='' method='post'>
            <input type="text" name="name" placeholder="<?php  echo $result['name']?>" value="<?php echo $result['name']?>"/>

            <!-- die Werte aus dem erzeugten Array werden als default gesetzt -->

            <p>Hiring? <input type="checkbox" name="yes" value="1" /></p>
            <input type="submit" value="abschicken">
        </form>
    </div>
    <div class="lynx">
    <p><a href="../read_department.php">hier geht es zur Tabelle</a></p>
    </div>
    <div class="lynx">
    <p><a href="http://www.bastian.web.bbq/index.php">hier gehts zurück zu meiner Seite</a></p>
    </div>
    </div>
    </body>
    </html>
    <?php
}


elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_GET['id'];
    $name = $_POST['name'];
    $hire = $_POST['yes'] ?? 0 ;

    $conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
    $sql2 = 'UPDATE Department SET name=:name,hiring=:hiring  WHERE id=:id';
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':hiring', $hire);

    $stmt->execute();
    ?>
    <html>
    <head>
        <meta charset="UTF-8" http-equiv="refresh" content="0; url= read_department.php">
    </head>
    </html> <?php
}
?>
