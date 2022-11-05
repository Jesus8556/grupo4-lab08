<?php 
    if(!isset($_GET['codigo'])){
        header('Location: home.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM Tiempo_Alquiler where id_Auto = ?;");
    $resultado = $sentencia->execute([$codigo]);
    $sentencia = $bd->prepare("DELETE FROM Autos where id = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: home.php?mensaje=eliminado');
    } else {
        header('Location: home.php?mensaje=error');
    }
    
?>
