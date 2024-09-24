<?php

require_once("db-miranda.php");

$id= isset($_GET["id"]) ? $_GET["id"] : 0 ;
$stmt = $conx->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->bind_param("i",$id);
$stmt->execute();
header("Location: listadoABM.php");





?>