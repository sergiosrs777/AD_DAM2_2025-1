<?php
function conectarDB()
{
    try{   
$cadenaConexion = "mysql:host=localhost;dbname=db_examen";
$usu="root";
$pw = "";
$db = new PDO($cadenaConexion,$usu,$pw);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
return $db;
}
catch(PDOException $ex){
    echo "Error conectando".$ex->getMessage();
}

}



?>