<?php
$mensaje = "";
$mostrarOpciones = false;

// El rompecabezas correcto: “26” + “25” + “000 000” para formar “26,25 millones”
$pieza1 = "26";
$pieza2 = "25";
$pieza3 = "000000";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $p1 = $_POST["p1"];
    $p2 = $_POST["p2"];
    $p3 = $_POST["p3"];

    if ($p1 === $pieza1 && $p2 === $pieza2 && $p3 === $pieza3) {
        $mostrarOpciones = true;
    } else {
        $mensaje = "<p style='color: red; font-size:22px;'>No es el salario correcto. Sigue pensando…</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Habitación 4 – Rompecabezas del Sueldo del Cholo</title>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('cholo.jpg');
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
        background: rgba(0, 0, 0, 0.7);
        padding: 30px;
        border-radius: 20px;
        width: 1000px;
        text-align: center;
    }

    .puzzle {
        display: flex;
        justify-content: space-around;
        margin-top: 30px;
    }

    .pieza {
        background: white;
        color: black;
        padding: 20px;
        border-radius: 10px;
        font-size: 24px;
        width: 180px;
        cursor: pointer;
        user-select: none;
    }

    select {
        font-size: 20px;
        padding: 10px;
        margin-top: 20px;
        border-radius: 10px;
    }

    button {
        margin-top: 25px;
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
    <h1> EL SALARIO DEL CHOLO</h1>

    <p style="font-size:22px;">
        Para avanzar, debes reconstruir cuánto cobra anualmente Diego Simeone en el Atlético.
    </p>
    <p style="font-size:22px; margin-top:10px; color:#00eaff;">
    La pista es: ¿Cuál es su alineación más utilizada?
</p>

    <form method="POST">

        <div class="puzzle">
            <div class="pieza">
                <select name="p1" required>
                    <option value="">--</option>
                    <option value="24">24</option>
                    <option value="30">30</option>
                    <option value="26">26</option>
                </select>

            </div>

            <div class="pieza">
                <select name="p2" required>
                    <option value="">--</option>
                    <option value="00">00</option>
                    <option value="50">50</option>
                    <option value="25">25</option>
                </select>
            </div>

            <div class="pieza">
                <select name="p3" required>
                    <option value="">--</option>
                    <option value="000000">000000</option>
                    <option value="00000">00000</option>
                    <option value="0000">0000</option>
                </select>
            </div>
        </div>

        <button type="submit">COMPROBAR</button>
    </form>

    <?php echo $mensaje; ?>

    <?php if ($mostrarOpciones) : ?>
        <h2 style="color: #00ff66; font-size:32px;">CORRECTO</h2>
        <p style="font-size:22px;">Cobra 26,25 millones al año</p>

        <a href="Habitacion_5.php"
           style="display: inline-block; margin-top:20px; padding:10px 20px;
                  background: white; color: black; border-radius: 10px; text-decoration: none; font-size:20px;">
            Ir a Habitación 5
        </a>
    <?php endif; ?>
</div>

</body>
</html>

