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

<body class="body">

<h1> Neues Personal Registrieren</h1><br>
<div class="form">
<form action='' method='post'>
    <input type="text" name="fname"placeholder="fname">
    <input type="text" name="lname"placeholder="lname">
    <input type="submit" value="abschicken">
</form><br>
</div>
<h2><a href="../firstread.php">hier gehts zurück</a></h2>

</body>
</html>
<?php
}


elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_GET['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
    $sql2 = 'UPDATE employer SET fname=:fname, lname=:lname WHERE id=:id';
    $stmt = $conn->prepare($sql2);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->execute();
}
?>
