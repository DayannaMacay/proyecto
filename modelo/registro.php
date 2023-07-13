<?php
    include 'conexion.php';
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $usuario=$_POST['usuario'];
    $contrasenia=$_POST['password'];
    $telefono=$_POST['telefono'];

    $consulta="INSERT into registro(nombre, apellido, usuario, contrasenia, telefono) values ('$nombre','$apellido', '$usuario', '$contrasenia','$telefono')";
    
    $resultado=mysqli_query($conexion,$consulta);

    //validacion para que no se repita el usuario
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM registro WHERE usuario = '$usuario'");
    if(mysqli_num_rows($verificar_usuario)>0){
        echo '<script>
            alert("El usuario ya existe, escoja otro por favor.");
            window.history.go(-1);
            </script>';
        exit;
    }

    if($resultado){
        echo '<script>
            alert("Registro exitoso");
            window.history.go(-1);
            </script>';
        exit;
    } else {
        echo '<script>
            alert("Registro fallido");
            window.history.go(-1);
            </script>';
        exit;
    }

    //cerrar conexion
    mysqli_close($conexion);
?>