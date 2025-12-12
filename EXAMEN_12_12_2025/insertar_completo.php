<?php
require_once "dbutils.php";
$conn = conectarDB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombreAtr = $_POST["nombre_atr"];
    $tipoAtr = $_POST["tipo_atr"];
    $alturaAtr = $_POST["altura_minima"];
    $nombreEmp = $_POST["nombre_emp"];
    $dniEmp = $_POST["dni_emp"];
    $horario = $_POST["horario"];
    $stmt = $conn->prepare("SELECT id_atraccion FROM atraccion WHERE nombre = :nombre");
    $stmt->bindValue(':nombre', $nombreAtr);
    $stmt->execute();
    $atraccion = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($atraccion) {
        $idAtraccion = $atraccion['id_atraccion'];
    } else {
        $stmtInsert = $conn->prepare(
            "INSERT INTO atraccion (nombre, tipo, altura_minima) VALUES (:nombre, :tipo, :altura)"
        );
        $stmtInsert->bindValue(':nombre', $nombreAtr);
        $stmtInsert->bindValue(':tipo', $tipoAtr);
        $stmtInsert->bindValue(':altura', $alturaAtr, PDO::PARAM_INT);
        $stmtInsert->execute();
        $idAtraccion = $conn->lastInsertId();
    }
    $stmt = $conn->prepare("SELECT id_empleado FROM empleado WHERE dni = :dni");
    $stmt->bindValue(':dni', $dniEmp);
    $stmt->execute();
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($empleado) {
        $idEmpleado = $empleado['id_empleado'];
    } else {
        $stmtInsert = $conn->prepare(
            "INSERT INTO empleado (nombre, dni) VALUES (:nombre, :dni)"
        );
        $stmtInsert->bindValue(':nombre', $nombreEmp);
        $stmtInsert->bindValue(':dni', $dniEmp);
        $stmtInsert->execute();
        $idEmpleado = $conn->lastInsertId();
    }

    $stmtTurno = $conn->prepare(
        "INSERT INTO turno_asignado (horario, id_atraccion, id_empleado)
         VALUES (:horario, :idAtr, :idEmp)"
    );
    $stmtTurno->bindValue(':horario', $horario);
    $stmtTurno->bindValue(':idAtr', $idAtraccion, PDO::PARAM_INT);
    $stmtTurno->bindValue(':idEmp', $idEmpleado, PDO::PARAM_INT);
    $stmtTurno->execute();

    echo "<p>Datos insertados correctamente.</p>";
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar datos completos</title>
</head>
<body>

<h1>Insertar datos</h1>
<form method="POST">
    <label>Nombre atracción:</label><br>
    <input type="text" name="nombre_atr" required><br>

    <label>Tipo atracción:</label><br>
    <input type="text" name="tipo_atr" required><br>

    <label>Altura mínima:</label><br>
    <input type="number" name="altura_minima" required><br>

    <label>Nombre empleado:</label><br>
    <input type="text" name="nombre_emp" required><br>

    <label>DNI empleado:</label><br>
    <input type="text" name="dni_emp" required><br>

    <label>Horario turno asignado:</label><br>
    <input type="text" name="horario" required><br><br>

    <button type="submit">Insertar</button>
</form>

<br>
<a href="mostrar_datos.php">mostrar datos</a>
<a href="index.php">menu</a>
</body>
</html>