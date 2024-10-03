<?php
//antes de nada inicializamos la variable session y le pasamos la info de post de la pagina1
session_start();

// Verificar si el valor 'frase1' ha sido enviado
if (isset($_POST['ocult'])) {
    // Asignar 'frase1' a la sesión
    $_SESSION['ocult'] = $_POST['ocult'];
} else {
    // Si no se recibe 'frase1', redirigir a ex42pagina1.php
    header("Location: ex41pagina1.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex41pagina2</title>
</head>
<body>
    <h1>Nombre Enregistrat</h1>

     <!-- Formulario para ir a la página de adivinanza -->
     <form method="POST" action="ex41pagina3.php">
        <input type="submit" value="Endevinar"/>
    </form>

    
</body>
</html>