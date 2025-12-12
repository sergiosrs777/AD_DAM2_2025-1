<?php
require_once("dbutils.php");
$miConexion = conectarDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

    <form action="app09.php" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre Coche</label>
            <input type="text" class="form-control" name="nombreCoche">
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre Marca</label>
            <input type="text" class="form-control" name="nombreMarca">
        </div>
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
</body>
</html>