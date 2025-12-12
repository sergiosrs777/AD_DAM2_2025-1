<?php
$mensaje = "";
$mostrarOpciones = false;
$respuestaCorrecta = 3;

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
<title>Habitación 3 - Escape Room Atleti</title>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('champions.jpg');
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
        cursor: pointer;
    }

    button:hover { background: red; }

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

    .pista-img {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 110px;
        cursor: pointer;
        border-radius: 8px;
    }
</style>
</head>

<body>
<img src="champions.jpg" class="pista-img" onclick="alert('3')" alt="Pista">

<div class="contenedor">

    <h1>HABITACIÓN DE LA CHAMPIONS</h1>

    <p>
        ¿Cuántas finales de Champions ha jugado el Atlético de Madrid?
    </p>

    <p style="font-size:22px; margin-top:5px;">La pista está en la habitación</p>

    <?php if (!$mostrarOpciones) : ?>
        <form method="POST">
            <input type="number" name="respuesta" placeholder="0" required><br>
            <button type="submit">RESPONDER</button>
        </form>
    <?php endif; ?>

    <?php echo $mensaje; ?>

    <?php if ($mostrarOpciones) : ?>
        <h2 style="color: green;">Correcto</h2>
        <p>Has superado la sala.</p>

        <div class="opciones">
            <a href="Habitacion_4.php">Ir a Habitación 4</a>
        </div>
    <?php endif; ?>

</div>

</body>
</html>

