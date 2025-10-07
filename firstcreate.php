<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
    $stmt = $conn->prepare("INSERT INTO employer(fname,lname) VALUES(:fname,:lname)");
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->execute();

} ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="http://www.bastian.web.bbq/mystyle.css?v=<?php echo time(); ?>" type="text/css">

        <!-- WICHTIG: man muss für Firefox in die CSS Info eine Instanz einbauen, die dafür sorgt, dass der Browser
         nicht die im Cache gespeicherte .CSS Datei nutzt, sondern immer die neuste Version lädt, sonst werden Veränderungen
         nicht richtig angezeigt-->

    </head>
<body class='body'>

<h1> Neues Personal Registrieren</h1><br>

<div class='form'>
<form action='' method='post'>
    <input type="text" name="fname"placeholder="fname">
    <input type="text" name="lname"placeholder="lname">
    <input type="submit" value="abschicken">
</form>
</div>
<p><a href="../firstread.php">hhier geht es zur Tabelle</a></p>
<br>
<p><a href="http://www.bastian.web.bbq/index.php">hier gehts zurück zu meiner Seite</a></p>

</body>
</html>

