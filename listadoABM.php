<?php

require_once("db-miranda.php");


$id= isset($_GET["id"]) ? $_GET["id"] : 0 ;
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$password = isset($_POST["password"])  ? $_POST["password"] : ""; 

$stmt = $conx->prepare("SELECT * FROM usuarios");
$stmt->execute();
$resultadoSTMT = $stmt->get_result();
$nuestroResultado = [];

while ($fila = $resultadoSTMT->fetch_object()) {
	$nuestroResultado[] = $fila;
}

$stmt->close();


?>


<html>

<table>
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($nuestroResultado as $fila) { ?>
				<tr>
					<td><?php echo $fila->usuario ?></td>
					<td><?php echo $fila->contraseña ?></td>
					<td><a href="agregar_editarABM.php?=id>">Editar</a></td>

					<td><a href="listadoABM.php">Eliminar</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</body>



</html>