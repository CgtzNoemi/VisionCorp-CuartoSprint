<?php

include_once("db_conexion.php");

$AngularData = file_get_contents("php://input");
if(isset($AngularData) && !empty($AngularData)){
    
    $request = json_decode($AngularData);

    $EmpleadoID = mysqli_real_escape_string($mysqli, trim($request->EmpleadoID)); 

    $sql = "DELETE FROM empleado WHERE EmpleadoID = ?";
    
    $stmt = mysqli_prepare($mysqli, $sql);

    mysqli_stmt_bind_param($stmt, "i", $EmpleadoID); 

    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        echo json_encode(['mensaje' => 'Registro eliminado con éxito']);
    } else {
        echo json_encode(['mensaje' => 'Error al eliminar el registro']);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
}
?>

