<?php
function conectarDB()
{
    try
    {
        $cadenaConexion = "mysql:host=localhost;dbname=CONCESIONARIO";
        $usu="root";
        $pw="";
        $db = new PDO($cadenaConexion,$usu,$pw);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch (PDOException $ex)
    {
        echo "Error conectando ".$ex->getMessage();
    }
}

function getMarca($db,$marca)
{
    try
    {
        $query= "SELECT * FROM MAERCAS WHERE NOMBRE=:NOMBRE";
        $pstmt = $db->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $pstmt->execute(array(':NOMBRE' => $marca));
        $existe = $pstmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $ex)
    {
        echo "Error en existeMarca ".$ex->getMessage();
    }
    return $existe;
}

function insertarMarca($db,$marca)
{
    $sqlInsert = "INSERT INTO MAERCAS(NOMBRE) VALUES (:NOMBRE)";
    try
    {
        $stmt = $db->prepare($sqlInsert);
        $stmt->bindParam(":NOMBRE",$marca);
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        echo "Error en insertarMarca ".$ex->getMessage();
    }
    return $db->lastInsertId();
}
function insertarCoche($db,$nombreCoche,$idMarca)
{
    $sqlInsert = "INSERT INTO COCHES(NOMBRE,ID_MARCA) VALUES (:NOMBRE,:ID_MARCA)";
    try
    {
        $stmt = $db->prepare($sqlInsert);
        $stmt->bindParam(":NOMBRE",$nombreCoche);
        $stmt->bindParam(":ID_MARCA",$idMarca);
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        echo "Error en insertarCoche ".$ex->getMessage();
    }
    return $db->lastInsertId();

}
?>