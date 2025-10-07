<?php

$conn = new PDO('mysql:host=localhost;dbname=company', 'bstnremo', 'X1dl§eAA7');
$sql = 'DELETE FROM employer WHERE id = :id ';
$id = $_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
?>

<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="refresh" content="0; url= firstread.php">
    <title>Title</title>
    <link rel="stylesheet" href="http://www.bastian.web.bbq/mystyle.css" type="text/css">


</head>
<body class='body'>
<ul>
    <li> <a href="/firstread.php">hier geht es zu meiner mariabDB Tabelle!</a></li>
</ul>
<ul>
    <li> <a href="/firstcreate.php">hier geht es zu meinem Formular!</a></li>
</ul>
</body>
</html>
