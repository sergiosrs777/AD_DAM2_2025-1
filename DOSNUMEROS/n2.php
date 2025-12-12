
<?php

/* 
* recibe los tres valores e incrementa en uno los dos campos primeros y el tercero lo decrementa en uno.
* otro campo que sea la suma de los 3 campos y otro campo que sea la concatenación de los 3 campos.
* si la suma es mayor que 15 el fondo del input en quinta posición es verde
* que aparezca de manera aleatoria una imagen entre 3 posibles de los simpsons(2 en local y 1 en Internet)4
* hacerlo sin array
*/

var_export($_POST);

$numero1 = $_POST['numero1']+1;
$numero2 = $_POST['numero2']+1;
$numero3 = $_POST['numero3']-1;
$suma = $numero1+$numero2+$numero3;
$estilo = "";
if ($suma>15)
{
    $estilo = " style='background-color: greenyellow '";
}

$imagenes = array("imagenes/imagen1.jpeg", "imagenes/imagen3.jpg", "https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/f8db2ff0-02a8-4c2d-b6c8-6580709dbaa9/compose?aspectRatio=1.78&format=webp&width=440");
$imagenrandom = $imagenes[array_rand($imagenes)];

$numAle = rand(1,3);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "MI TITULO".$numero3 ?></title>
</head>
<body>
    <br/>
    <input type="text" value="<?php echo $numero1 ?>"/>
    <br/>
    <input type="text" value="<?php echo $numero2?>"/>
    <br/>
    <input type="text" value="<?php echo $numero3?>"/>
    <br/>
    <input type="text" value="<?php echo $suma?>"/>
    <br/>
    <input type="text" <?php echo $estilo?> value="<?php echo $numero1.$numero2.$numero3?>"/>
    <br/>
    <img src=<?php echo $imagenrandom; ?> height="500px" width="500px"/>
   <br/>
    <img src=<?php echo "imagenes/imagen".$numAle.".jpeg"; ?> height="500px" width="500px"/>
</body>
</html>