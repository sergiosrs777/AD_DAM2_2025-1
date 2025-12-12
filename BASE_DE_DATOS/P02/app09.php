<?php 
require_once("dbutils.php");
$miConexion = conectarDB();
var_export($_POST);
// si no existe la marca la inserto
if (!getMarca($miConexion,$_POST['nombreMarca']))
{
    insertarMarca($miConexion,$_POST['nombreMarca']);
}
$marcaAux = getMarca($miConexion,$_POST['nombreMarca']);
$insertadoOK = insertarCoche($miConexion,$_POST['nombreCoche'],$marcaAux['ID']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LA INSERCIÓN HA IDO: <?php echo ($insertadoOK)?"OK":"KO" ?></h1>
</body>
</html>