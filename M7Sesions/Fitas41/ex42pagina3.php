<?php
// Iniciar la sesión antes de cualquier salida HTML
session_start();

// Verificar si el valor 'frase2' ha sido enviado por el formulario
if (isset($_POST['frase2'])) {
    // Asignar el valor a la sesión
    $_SESSION['frase2'] = $_POST['frase2'];
} else {
    // Si no se recibe 'frase2', redirigir a ex42pagina2.php
    header("Location: ex42pagina2.php");
    exit();
}

// Dividir las frases en palabras usando explode()
$palabrasFrase1 = explode(' ', $_SESSION['frase1']);
$palabrasFrase2 = explode(' ', $_SESSION['frase2']);

// Encontrar las palabras coincidentes con array_intersect()
$coincidencias = array_intersect($palabrasFrase1, $palabrasFrase2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex42pagina2</title>
</head>
<body>
    <h1>COINCIDÈNCIES</h1>

    <!-- Enlace para regresar a la primera página -->
    <a href="ex42pagina1.php">ENREGISTRA FRASE</a>
    <br>

    <?php
    // Mostrar los resultados de las coincidencias
    if (!empty($coincidencias)) {
        // Mostrar palabras coincidentes
        echo "Paraules coincidents: " . implode(', ', $coincidencias);
    } else {
        // Mostrar mensaje si no hay coincidencias
        echo "No hi ha paraules coincidents.";
    }
    ?>

</body>
</html>
