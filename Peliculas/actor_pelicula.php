<?php
include ("../conexiondb.php");
$sql = "SELECT F.film_id, F.title, F.description, F.release_year 
FROM film AS F INNER JOIN film_actor AS FA ON F.film_id=FA.film_id 
WHERE FA.actor_id=:actor_id";
$stm = $conexion -> prepare ($sql);
$stm -> bindParam (":actor_id", $_GET ['id']);
$stm -> execute ();
$datos = $stm -> fetchAll (PDO::FETCH_ASSOC);
$json = json_encode ($datos);
include ('../envio.php');
?>