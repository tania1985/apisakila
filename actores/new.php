<?php
if (isset ($_POST ["name"]) && $_POST ["lastname"]){
include ("../conexiondb.php");
$sql = "INSERT INTO actor (first_name, last_name) VALUES (:first_name, :last_name)";
$stm = $conexion -> prepare ($sql);
$stm -> bindParam (":first_name",$_POST ['name']);
$stm -> bindParam (":last_name",$_POST ['last_name']);
$stm -> execute ();
$actor_id = $conexion -> lastInsertId ();
$datos = [
    'actor_id' => $actor_id,
    'first_name' => $_POST['name'],
    'last_name' => $_POST['last_name']
];
$json = json_encode ($datos);
// Establece la cabecera para indicar que la respuesta es JSON
header ('Content-Type: application/json');
echo $json;
}
else {
    $response = [
        'status' => '200',
        'message' => 'No se han recibido los datos necesarios'
    ];
    $json = json_encode ($response);
}
header ('Content-Type: application/json');
echo $json;
?>