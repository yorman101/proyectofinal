<?php
require('funciones/conexion.php');
$errores= array();
if(isset($_GET['id'])){
    $idComentario=$mysqli->real_escape_string($_GET['id']);
    if(empty($idComentario)){
        $errores[] = "el id esta vacio";
    }else{
        $sql="DELETE FROM comentarios WHERE id=$idComentario";
        $result= $mysqli->query($sql);
    }
}else{
    $errores[]="no puedes estar en esta pagina";
}
?><!DOCTYPE html>
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
            <h2>Borrar comentarios</h2>

            <div class="comentario">
                <?php
                    if(isset($result)){
                        if($result){
                            if($mysqli->affected_rows>0){
                                echo "<div class='succes'>comentario borrado correctamente </div>";
                            }else{
                                $errores[]="este comentario no existe";
                            }
                        }else{
                            $errores[]="error en la consulta";
                        }
                    }
                ?>
                <?php

                    if(count($errores)>0){
                        echo "<div class='error'>";
                        foreach($errores as $error){
                            echo "!!!!!!!!!!!!! error jajajajjaja".$error."<br>";
                        }
                        echo"</div";
                    }
                    $mysqli->close();
                ?>
                <a href="sistemacomentarios.php " style="color: aqua; text-decoration: none;">Regresar a la pagina de inicio</a>
            </div>

            <?php

                    if(count($errores)>0){
                        echo "<div class='error'>";
                        foreach($errores as $error){
                            echo "!!!!!!!!!!!!!".$error."<br>";
                        }
                        echo"</div>";
                    }
            ?>
        </div>
    </div>
    <div class="btn-add">
        <a href="insertar.php"><button class="añadir"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 10px;margin:10px;margin-bottom: 0px;" width="60px" height="60px" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg></button></a>
    </div>
</body>
</html>