<?php
$mensaje = "";
$mostrarBoton = false;

// Código correcto del candado
$codigoCorrecto = "012345";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $codigo = $_POST["codigo"] ?? "";
    $codigo = str_replace(" ", "", $codigo); // eliminar espacios si hay

    if ($codigo === $codigoCorrecto) {
        $mostrarBoton = true;
    } else {
        $mensaje = "<p style='color: red; font-size:22px;'>Código incorrecto. Recuerda: ha pasado por cada número…</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Última Habitación – Candado Atlético</title>
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
        text-shadow: 2px 2px 8px black;
    }

    .contenedor {
        background: rgba(0,0,0,0.8);
        padding: 30px;
        border-radius: 20px;
        width: 600px;
        text-align: center;
    }

    .instrucciones {
        font-size: 22px;
        margin-bottom: 20px;
    }

    .pista {
        font-size: 18px;
        color: #00eaff;
        margin-bottom: 20px;
    }

    input {
        font-size: 28px;
        padding: 10px;
        width: 250px;
        border-radius: 10px;
        text-align: center;
        letter-spacing: 5px;
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

    .mensaje-final {
        font-size: 28px;
        color: #00ff66;
        margin-top: 20px;
    }

</style>
</head>
<body>

<div class="contenedor">
    <h1> EL CANDADO FINAL </h1>

    <p class="instrucciones">
        Introduce el código de 6 números para desbloquear la última habitación.
    </p>
    <p class="pista">
        Pista: Ha pasado por cada número…
    </p>

    <form method="POST">
        <input type="text" name="codigo" maxlength="6" placeholder="000000" required>
        <br>
        <button type="submit">ABRIR</button>
    </form>

    <?php echo $mensaje; ?>

    <?php if ($mostrarBoton) : ?>
        <p class="mensaje-final">¡Eres un colchonero!</p>
        <a href="Habitacion_0.php"
           style="display: inline-block; margin-top:20px; padding:10px 20px;
                  background: white; color: black; border-radius: 10px; text-decoration: none; font-size:20px;">
            Volver a jugar
        </a>
    <?php endif; ?>
</div>

</body>
</html>
