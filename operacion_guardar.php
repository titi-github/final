<!DOCTYPE html> 
<html>
<head>
          <title>tabla</title>
         
</head>
<body>
	<div class="mostrardatos">
<center>

 		<tr>
 			<th><a href="formulario.html">NUEVO</a></th>
  		     <th>verifica tu registro y pulsa en NUEVO para crear nuevos registros</th>
  		</tr>

<table  border = 1px>
<thead>
 		
</thead>
<tbody>
        <tr>
	    <td>NOMBRE</td> 
	    <td>APELLIDO</td>
	    <td>EMAIL</td>
         </tr>

<?php
$conexion=mysqli_connect('localhost','root','','operaciones');
$sql="SELECT * from usuarioss";
$result=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>
<tr>
    <td><?php echo $mostrar['nombre'] ?></td>
    <td><?php echo $mostrar['apellido'] ?></td>
    <td><?php echo $mostrar['email'] ?></td>
</tr>
<?php
}
?>

</tbody>
</table>
</center>
</body>
</html>     

<table border = 1px>
<center>
<?php
$conexion=mysqli_connect('localhost','root','','operaciones');
?>

<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$clave = $_POST['clave'];

if(!empty($nombre) || !empty($apellido) || !empty($email)|| !empty($clave)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "operaciones";
    
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
else {
        $INSERT = "INSERT INTO usuarioss (nombre,apellido,email,clave)values(?,?,?,?)";
    
	    $stmt = $conn->prepare($INSERT);
        $stmt ->bind_param("sssi", $nombre,$apellido,$email,$clave);
        $stmt ->execute();
        echo "REGISTRO COMPLETADO.";
}
            $stmt->close();
            $conn->close();

}   

else { 
	echo "todos los datos son OBLIGATORIOS";
	die();
}
?> 