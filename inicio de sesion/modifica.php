<?php
    require('funciones/conexion.php');
    $errores=array();
    if(isset($_POST['enviar'])){
        $mi_nombre=$mysqli->real_escape_string($_POST['miNombre']);
        $mi_calificacion=$mysqli->real_escape_string($_POST['miCalificacion']);
        $mi_comentario=$mysqli->real_escape_string($_POST['miComentario']);
        $mi_id=$mysqli->real_escape_string($_POST['miID']);
        if(!empty($mi_nombre)&&!empty($mi_calificacion)&&!empty($mi_comentario)&&!empty($mi_id)){
            $mi_fecha=date("Y-m-d H:i:s");
            $sql="UPDATE comentarios SET nombre='$mi_nombre',comentario='$mi_comentario',calificacion='$mi_calificacion' WHERE id='$mi_id'";
            $result=$mysqli->query($sql);
        }else{
            $errores="Rellena todos los campos";
        }
    }else{
        $errores="No has enviado el formulario";
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
            <h2>Estado de la modificacion</h2>

            
                <?php
                    if(isset($result)){
                        if($result){
                            if($mysqli->affected_rows>0){
                                echo "<div class='succes'>comentario modificado correctamente correctamente </div>";
                            }else{
                                $errores[]="No se modifico ningun comentario";
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
                <a href="sistemacomentarios.php" style="color: aqua; text-decoration: none;">Regresar a la pagina de inicio</a>
           

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