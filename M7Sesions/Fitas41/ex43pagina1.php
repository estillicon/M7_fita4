<?php
session_start();

if (isset($_GET['reiniciar'])) {
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header("Location: ex43pagina1.php"); // Redirigimos de nuevo a la página principal
    exit();
}

if (isset($_GET['lletra'])) {
    $lletra = $_GET['lletra'];

    if (!isset($_SESSION['lletra'])) {
        $_SESSION['lletra'] = []; // Inicializa el array si no existe
    }

    $_SESSION['lletra'][] = $lletra; // Añade la letra a la sesión
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquina d'escriure</title>
    <style>
        /* Estilo para que los formularios parezcan enlaces */
        .link {
            background: none;
            border: none;
            color: blue;
            text-decoration: none;
            cursor: pointer;
            padding: 0;
            font-size: inherit;
        }
    </style>
</head>
<body>
<h1>Maquina d'escriure</h1>
<br>

<?php
// Generar el abecedario con enlaces
for ($i = 65; $i <= 90; $i++) {
    $char = chr($i); // Convierte el valor ASCII a una letra
    echo '<form method="GET" action="ex43pagina1.php" style="display:inline;">
        <button type="submit" name="lletra" value="' . $char . '" class="link">' . $char . '</button>
    </form> ';
    echo " ";
    //echo " ";
    
   
   
}
?>

<br><br>

<?php
if (isset($_SESSION['lletra'])) {
    foreach ($_SESSION['lletra'] as $value) {
        echo "<a href='ex43pagina1.php?lletra=" . urlencode($value) . "'>$value</a>";
    }
} 
?>

<br>
<!-- Enlace para reiniciar la sesión -->
<a href="ex43pagina1.php?reiniciar=true">Reiniciar</a>

</body>
</html>
