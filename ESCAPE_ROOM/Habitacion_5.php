<?php
$mensaje = "";
$mostrarOpciones = false;

$capacidadCorrecta = "68456";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $respuesta = $_POST["respuesta"] ?? "";

   
    $respuesta = str_replace(" ", "", $respuesta);

    if ($respuesta === $capacidadCorrecta) {
        $mostrarOpciones = true;
    } else {
        $mensaje = "<p style='color: red; font-size:22px;'>No es correcto</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Estadio Metropolitano</title>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('estadio_metropolitano.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
        color: white;
        text-shadow: 2px 2px 8px black;
    }

    .contenedor {
        background: rgba(0,0,0,0.8);
        padding: 30px;
        border-radius: 20px;
        width: 800px;
        text-align: center;
    }

    .instrucciones {
        font-size: 22px;
    }

    .pista {
        font-size: 18px;
        margin: 10px 0 20px;
        color: #00eaff;
    }

    .input-num {
        font-size: 28px;
        padding: 10px;
        width: 200px;
        border-radius: 10px;
        text-align: center;
    }

    button {
        margin-top: 20px;
        padding: 12px 25px;
        font-size: 20px;
        background: red;
        color: white;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }

    button:hover {
        background: darkred;
    }

</style>
</head>
<body>

<div class="contenedor">
    <h1>ESTADIO METROPOLITANO</h1>

    <p class="instrucciones">
        Para avanzar, introduce el número exacto de espectadores que entran en el estadio.
    </p>

    <p class="pista">
        Pista: Empieza con 68 y los siguientes son tres numeros consecutivos
    </p>

    <form method="POST">
        <input class="input-num" type="text" name="respuesta" required>
        <br>
        <button type="submit">COMPROBAR</button>
    </form>

    <?php echo $mensaje; ?>

    <?php if ($mostrarOpciones) : ?>
        <h2 style="color: #00ff66; font-size:32px;">CORRECTO</h2>
        <a href="Habitacion_6.php"
           style="display: inline-block; margin-top:20px; padding:10px 20px;
                  background: white; color: black; border-radius: 10px; text-decoration: none; font-size:20px;">
            Ir a Habitación 6
        </a>
    <?php endif; ?>
</div>

</body>
</html>
