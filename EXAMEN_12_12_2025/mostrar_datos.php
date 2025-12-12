<?php
require_once "dbutils.php";
$conn = conectarDB();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Datos</title>
</head>
<body>

<h1>Datos de Atracciones, Empleados y Turnos</h1>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nombre Atracción</th>
        <th>Tipo Atracción</th>
        <th>Altura Mínima</th>
        <th>Nombre Empleado</th>
        <th>DNI Empleado</th>
        <th>Horario Turno</th>
    </tr>

<?php

$turnos = $conn->query("SELECT * FROM turno_asignado");

foreach ($turnos as $turno) {


    $stmtAtr = $conn->prepare("SELECT nombre, tipo, altura_minima FROM atraccion WHERE id_atraccion = :id");
    $stmtAtr->bindValue(':id', $turno['id_atraccion'], PDO::PARAM_INT);
    $stmtAtr->execute();
    $atr = $stmtAtr->fetch(PDO::FETCH_ASSOC);

    $stmtEmp = $conn->prepare("SELECT nombre, dni FROM empleado WHERE id_empleado = :id");
    $stmtEmp->bindValue(':id', $turno['id_empleado'], PDO::PARAM_INT);
    $stmtEmp->execute();
    $emp = $stmtEmp->fetch(PDO::FETCH_ASSOC);

    echo "<tr>";
    echo "<td>" . htmlspecialchars($atr['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($atr['tipo']) . "</td>";
    echo "<td>" . htmlspecialchars($atr['altura_minima']) . "</td>";
    echo "<td>" . htmlspecialchars($emp['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($emp['dni']) . "</td>";
    echo "<td>" . htmlspecialchars($turno['horario']) . "</td>";
    echo "</tr>";
}
?>
    </table>

<br>
<a href="index.php">menu</a>
<a href="insertar_completo.php">insertar datos</a>
</body>
</html>