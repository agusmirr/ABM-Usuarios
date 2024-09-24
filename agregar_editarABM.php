<?php

require_once("db-miranda.php");

$id= isset($_GET["id"]) ? $_GET["id"] : 0 ;

//$id  = $_GET["id"];

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$password = isset($_POST["password"])  ? $_POST["password"] : ""; 
$envio_formulario = isset($_POST["envio_formulario"]) ? $_POST["envio_formulario"] : 0;

if ($envio_formulario == 1) {

    $error = 0;
    $mensaje = "";

    if (empty($usuario)) {
        $error= 1;
        $mensaje= "Ingrese usuario";
    }

    if (empty($password)) {
        $error = 1;
        $mensaje= "Ingrese contraseña";
    }

   if ($error == 0) {
        $sql = "INSERT INTO usuarios (usuario, password)";
        $sql.= "VALUES (?,?) ";
        
        $stmt = $conx->prepare($sql);
        $stmt->bind_param("ss",$usuario,$password);
        $stmt->execute();
        $stmt->close();

        $mensaje= "Usuario creado con exito";

     } else {

        echo $mensaje;
     }

}

$sql = "SELECT * FROM usuarios WHERE id = ? ";

	$stmt = $conx->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();

	$resultado = $stmt->get_result();

	$usuario = $resultado->fetch_object();
    

	$stmt->close();

    
	if ($usuario === null) {
		$id = 0;
		$password = "";
	} else {
		$id = $usuario->id;
		$passwor = $usuario->password;

	}


?>

<form method="POST">
    <input type="hidden" value= 1 name= "envio_formulario">

<br><label >USUARIO</label><br>
<br><input type="text"  value="<?php echo $usuario->usuario ?>" name="usuario"><br>


<br><label >CONTRASEÑA</label><br>
<br><input type="text"  value="<?php echo $usuario->password ?>" name="password"><br>



<input type="submit">








</form>