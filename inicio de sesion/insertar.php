<?php
require('funciones/conexion.php');
$errores= array();

if(isset($_POST['enviar'])){
    $mi_nombre= $mysqli->real_escape_string($_POST['miNombre']);
    $mi_calificacion=$mysqli->real_escape_string($_POST['miCalificacion']);
    $mi_comentario=$mysqli->real_escape_string($_POST['miComentario']);
    //var_dump($_POST);
    if(!empty($mi_nombre) && !empty($mi_calificacion) && !empty($mi_comentario)){

        $mi_fecha=date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO comentarios (id, nombre, comentario, fecha, calificacion) VALUES (NULL, '$mi_nombre', '$mi_comentario', '$mi_fecha', '$mi_calificacion')";
        $result = $mysqli->query($sql);
    }else{
        $errores[]="Rellena todos los campos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Comentarios</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="comentarios">
            <h2>Insertar comentarios</h2>
            <?php
                if(isset($result)){
                    if($result){
                        echo "<div class='succes'>comentario insertado correctamente </div>";
                    }else{
                        $errores[]="sucedió un error";
                    }
                }
            ?>
            <?php
                    
                if(count($errores)>0){
                    echo "<div class='error'>";
                    foreach($errores as $error){
                        echo "!!!!!!!!!!!!! error jajajajjaja".$error."<br>";
                    }
                    echo"</div>";
                }
                $mysqli->close();
                    
            ?>

            <div class="formulario">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <label for="">Nombre</label>
                    <input type="text" name="miNombre">
                    <label for="">calificacion</label>
                    1
                    <input type="radio" name="miCalificacion" value="1">
                    2
                    <input type="radio" name="miCalificacion" value="2">
                    3
                    <input type="radio" name="miCalificacion" value="3">
                    4
                    <input type="radio" name="miCalificacion" value="4">
                    5
                    <input type="radio" name="miCalificacion" value="5" checked>
                    <label for="">Comentario</label>
                    <textarea name="miComentario" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Enviar" name="enviar">
                </form>

            </div>
                <a href="sistemacomentarios.php" style="color: aqua; text-decoration: none;">Regresar a la pagina de inicio</a>


        </div>
    </div>
    <div class="btn-add">
        <a href="insertar.php"><button class="añadir"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 10px;margin:10px;margin-bottom: 0px;" width="60px" height="60px" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg></button></a>
    </div>
</body>
</html>