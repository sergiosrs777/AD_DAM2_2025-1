<?php
$mensaje = "";
$mostrarOpciones = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $respuesta = trim($_POST["respuesta"]);
    $correcta = 11;

    if ($respuesta == $correcta) {
        $mostrarOpciones = true;
    } else {
        $mensaje = "<p style='color: red; font-size:22px;'>Respuesta incorrecta. ¡Inténtalo otra vez!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Habitación 0 - Escape Room Atleti</title>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('atletico_de_madrid_logo.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
        color: white;
        text-shadow: 2px 2px 5px black;
    }

    .contenedor {
        background: rgba(0,0,0,0.55);
        padding: 25px;
        width: 1920px;
        text-align: center;
        position: relative;
    }

    input {
        width: 100%;
        font-size: 22px;
        padding: 6px;
        text-align: center;
        margin-top: 10px;
        border-radius: 25px;
    }

    button {
        width: 20%;
        margin-top: 15px;
        padding: 10px 25px;
        font-size: 18px;
        background: blue;
        color: black;
        border-radius: 25px;
    }

    button:hover {
        background: red;
    }

    .cero {
        position: relative;
    }

    .cero:hover::after {
        content: "11";
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 8px;
        white-space: nowrap;
        z-index: 100;
    }

    .opciones a {
        display: block;
        margin: 10px 0;
        padding: 10px;
        background: white;
        color: black;
        border-radius: 8px;
        text-decoration: none;
        font-size: 18px;
    }

    .opciones a:hover {
        background: red;
    }
</style>
</head>

<body>

    <div class="contenedor">
        <h1>HABITACION <span class="cero">0</span></h1>
        <h2>¿Cuántas ligas tiene el Atlético de Madrid?</h2>

        <?php if (!$mostrarOpciones) : ?>
            <form method="POST">
                <input type="number" name="respuesta" placeholder="0" required>
                <br>
                <button type="submit">RESPONDER</button>
            </form>
        <?php endif; ?>

        <?php echo $mensaje; ?>

        <?php if ($mostrarOpciones) : ?>
            <h2 style="color: green;">Correcto</h2>

            <div class="opciones">
                <a href="Habitacion_1.php">Ir a la habitacion de griezmann</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>


