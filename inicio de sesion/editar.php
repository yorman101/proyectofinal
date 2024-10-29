<?PHP
    require("funciones/conexion.php");

    $errores = array();

    $flag=0;
    if(isset($_GET['id'])){
        $mi_id=$mysqli->real_escape_string($_GET['id']);
        if(isset($mi_id)){
            $sql="SELECT * FROM comentarios WHERE id ='$mi_id'";
            $result=$mysqli->query($sql);
            if($result->num_rows>0){
                $flag=1;
                $datos=$result->fetch_assoc();
            }else{
                $errores[]="No hay ningun comentario con ese id";
            }
        }else{
            $errores[]="El id esta vacio";
        }
    }else{
        $errores[]="No me estas enviando ningun id";
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
            <h2>Editar comentarios</h2>
            <?php
                    
                if(count($errores)>0){
                    echo "<div class='error'>";
                    foreach($errores as $error){
                        echo "!!!!!!!!!!!!! error jajajajjaja".$error."<br>";
                    }
                    echo"</div>";
                }
                if($flag==1){

                    
            ?>

            <div class="formulario">
                <form action="modifica.php" method="POST">
                    <label for="">Nombre</label>
                    <input type="text" name="miNombre" value="<?php echo $datos['nombre']; ?>">
                    <label for="">calificacion</label>
                    1
                    <input type="radio" name="miCalificacion" value="1" <?php if($datos['calificacion']==1){echo"checked";}?>>
                    2
                    <input type="radio" name="miCalificacion" value="2"<?php if($datos['calificacion']==2){echo"checked";}?>>
                    3
                    <input type="radio" name="miCalificacion" value="3"<?php if($datos['calificacion']==3){echo"checked";}?>>
                    4
                    <input type="radio" name="miCalificacion" value="4"<?php if($datos['calificacion']==4){echo"checked";}?>>
                    5
                    <input type="radio" name="miCalificacion" value="5" <?php if($datos['calificacion']==5){echo"checked";}?>>
                    <label for="">Comentario</label>
                    <textarea name="miComentario" id="" cols="30" rows="10"><?php echo $datos['comentario']; ?></textarea>
                    <input type="hidden" name="miId" value="<?php echo $datos['id']; ?>">
                    <input type="submit" value="Enviar" name="enviar">
                </form>

            </div>
            <?php
                }
            ?>
            <a style="color: aqua; text-decoration: none;" href="sistemacomentarios.php">Regresar a la pagina de inicio</a>


        </div>
    </div>
    <div class="btn-add">
        <a href="insertar.php"><button class="añadir"><svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 10px;margin:10px;margin-bottom: 0px;" width="60px" height="60px" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/></svg></button></a>
    </div>
</body>
</html>