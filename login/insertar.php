<?php
if(isset($_POST['usuario']) and isset ($_POST['password'])){
    include 'conexion.php';
    $nombre_de_usuario=mysqli_real_escape_string($conexion,$_POST['usuario']);
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $insertar=mysqli_query($conexion,'insert into registros(nombre,passwor) values
    ("'.$nombre_de_usuario.'","'.$password.'")') or die ('No se pudo registrar<b>'.mysqli_error($conexion));
    header('location: ./');
}else{
    header('location: ./');
}
?>