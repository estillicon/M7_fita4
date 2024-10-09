<?php
session_start();
// Reiniciar la sesión si se solicita
if (isset($_GET['reiniciar'])) {
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header("Location: ex44pagina1.php"); // Redirige a la misma página
    exit();
}

if (isset($_POST['conjunttext'])) {
    $conjunttext = $_POST['conjunttext'];

    // miramos si ya existe el array en la sesión
    if (!isset($_SESSION['conjunttext'])) {
        $_SESSION['conjunttext'] = []; // Inicializamos el array si no existe
    }

    //añadimos la oracion al final del array importante utilizar esto y no $_SESSION['conjunttext'] = $conjunttext; que sobreescribe
    $_SESSION['conjunttext'][] = $conjunttext;
     //ruta del archivo. como es la misma que este scrip se pone el nombre directamente
    $NouFitxe = "ex44pagina1.txt";
    //abrimos el archivo y si no echiste lo crea en modo escritura(a)
    $archivoAbierto = fopen($NouFitxe,"a");
    if ($archivoAbierto) {
 
        // Escribir los datos en el archivo
        fwrite($archivoAbierto, $conjunttext . "\n\n");//le metemos doble salto
         
         
        // Cerrar el archivo después de escribir los datos
        fclose($archivoAbierto);
        
         
    } else {
        echo "No se pudo abrir el archivo.";
    }
}

//HACERLO COPIANDO EN UN TXT

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TXT</title>
</head>
<body>
    <h1>Bloc de notas</h1>

    <form method="POST" action="ex44pagina1.php">
    <!--creamos un bloque textarea con un tamaño definido-->
    <textarea name="conjunttext" rows="4" cols="50" required></textarea>
    <input type="submit" value="Guardar"/>

    </form>
    <?php
    // Mostramos todas las frases almacenadas en la sesión en la página
    if (isset($_SESSION['conjunttext'])) {
        foreach ($_SESSION['conjunttext'] as $value) {
            echo "$value<br><br>";
        }
    }
    ?>
     <!-- enlace que renicia la sesion -->
     <a href="ex44pagina1.php?reiniciar=true">Reinicia</a>
    
</body>
</html>