<?php
// Iniciar la sesión
session_start();

// Verificar si el valor 'frase1' ha sido enviado
if (isset($_POST['frase1'])) {
    // Asignar 'frase1' a la sesión
    $_SESSION['frase1'] = $_POST['frase1'];
} else {
    // Si no se recibe 'frase1', redirigir a ex42pagina1.php
    header("Location: ex42pagina1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex42pagina2</title>
</head>
<body>
    <h1>ENREGISTRA FRASE 2</h1>
<!--volvemos a pedir una frase y la enviamos a la paguina 3 esta vez con el post-->
    <form method="POST" action="ex42pagina3.php">
        <input type="text" name="frase2" required />
        <input type="submit" value="Enviar frase2" />
    </form>
</body>
</html>
