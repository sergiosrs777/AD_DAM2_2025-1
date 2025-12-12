<?php
// Start the session
session_start();


var_export($_SESSION);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="s03.php" method="post">
        <input type="submit" value="dame!!!">
    </form>
    <form action="cerrarSession.php" method="post">
        <input type="submit" value="cerrar sesión">
    </form>
</body>
</html>