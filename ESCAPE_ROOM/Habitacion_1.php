<?php
$mensaje = "";
$mostrarOpciones = false;
$respuestaCorrecta = 200;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $respuesta = trim($_POST["respuesta"]);

    if ($respuesta == $respuestaCorrecta) {
        $mostrarOpciones = true;
    } else {
        $mensaje = "<p style='color: red; font-size:22px;'>Respuesta incorrecta</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Habitación 1 - Escape Room Atleti</title>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('griezmann.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
        color: white;
        text-shadow: 2px 2px 8px black;
    }

    .contenedor {
        background: rgba(0,0,0,0.6);
        padding: 25px;
        border-radius: 15px;
        width: 1920px;
        text-align: center;
        position: relative;
    }

    input {
        width: 80%;
        font-size: 22px;
        padding: 6px;
        margin-top: 10px;
        text-align: center;
        border-radius: 25px;
    }

    button {
        width: 200px;
        margin-top: 15px;
        padding: 10px 25px;
        font-size: 18px;
        background: blue;
        color: black;
        border: none;
        border-radius: 25px;
    }

    button:hover { background: red; }

    .volver {
        width: 200px;
        background: green;
        margin-bottom: 10px;
        display: inline-block;
        padding: 10px 18px;
        border-radius: 25px;
        text-decoration: none;
        color: white;
    }
    .volver:hover { background: red; }

    .tooltip {
        position: relative;
    }

    .tooltip:hover::after {
        position: absolute;
        top: -35px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0,0,0,0.85);
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 15px;
        white-space: nowrap;
        z-index: 100;
        text-shadow: none;
    }

    .pista1:hover::after { content: "1: Líneas del escudo ÷ 4"; }
    .pista2:hover::after { content: "2: El número más repetido en la sala"; }
    .pista3:hover::after { content: "3: Es el primer número de 3 cifras"; }

    .opciones a {
        display: block;
        margin: 10px 0;
        padding: 10px;
        background: white;
        color: blue;
        border-radius: 8px;
        text-decoration: none;
        font-size: 18px;
    }
    .opciones a:hover { background: red; }
</style>
</head>

<body>

    <div class="contenedor">

        
        <?php if (!$mostrarOpciones) : ?>
            <a class="volver" href="Habitacion_0.php">HABITACION 0</a>
        <?php endif; ?>

        <h1 class="tooltip pista2">HABITACION GRIEZMANN</h1>

        <p>
            ¿Cuántos goles ha marcado 
            <strong class="tooltip pista1">Griezmann</strong> 
            con el Atlético de Madrid?
        </p>

        <p>
            Si necesitas ayuda prueba con esta 
            <span class="tooltip pista3"><strong>otra</strong></span>.
        </p>

        <?php if (!$mostrarOpciones) : ?>
            <form method="POST">
                <input type="number" name="respuesta" placeholder="0" required><br>
                <button type="submit">RESPONDER</button>
            </form>
        <?php endif; ?>

        <?php echo $mensaje; ?>

        <?php if ($mostrarOpciones) : ?>
            <h2 style="color: green;">Correcto</h2>
            <p>Has superado esta sala.</p>

            <div class="opciones">
                <a href="Habitacion_2.php">Ir a Habitación de la copa</a>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>


