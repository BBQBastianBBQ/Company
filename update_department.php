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
           <div> <input type="text" name="name" placeholder="<?php  echo $result['name']?>" value="<?php echo $result['name']?>"/>
           </div>

            <!-- die Werte aus dem erzeugten Array werden als default gesetzt -->

            <p>Hiring? <input type="checkbox" name="yes" value="1" /> <label>YES </label> </p>
            <input type="radio"  name="workmode" value="Onsite"  />
            <label>Onsite</label>
            <input type="radio"  name="workmode" value="Remote"  />
            <label>Remote</label>
            <input type="radio"  name="workmode" value="Hybrid"  />
                <label>Hybrid</label>
            <br><br>
            <input type="submit" value="abschicken">
        </form>
    </div>
    <div class="lynx">
    <p><a href="../read_department.php">hier geht es zur Tabelle</a></p>
    </div>
    <div class="lynx">
    <p><a href="/index.php">zurück zur Startseite</a></p>
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
    $workmode = $_POST['workmode'];

    $conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
    $sql2 = 'UPDATE Department SET name=:name,hiring=:hiring,workmode=:workmode  WHERE id=:id';
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':hiring', $hire);
    $stmt->bindParam(':workmode', $workmode);

    $stmt->execute();
    ?>
    <html>
    <head>
        <meta charset="UTF-8" http-equiv="refresh" content="0; url= read_department.php">
    </head>
    </html> <?php
}
?>
