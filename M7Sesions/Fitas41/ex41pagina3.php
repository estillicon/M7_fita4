<?php
// Iniciar la sesión antes de cualquier salida HTML
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex41pagina3</title>
</head>
<body>
    <h1>ENDEVINA EL NOMBRE</h1>

    <?php
    // Verificar si el número oculto está definido en la sesión
    if (isset($_SESSION['ocult'])) {
        // Si se ha enviado un número para adivinar, hacer la comparación
        if (isset($_POST['endevina'])) {
            $endevina = (int)$_POST['endevina'];
            $ocult = (int)$_SESSION['ocult'];

            // Comparar los números. caso de acertar
            if ($endevina === $ocult) {
                // Si se adivina correctamente, mostrar mensaje de felicitación y enlace, pero NO el formulario
                echo "<p>¡Felicidades! Has adivinado el número oculto: $ocult</p>";
                echo '<a href="ex41pagina1.php">Volver a la página principal</a>';
            } elseif ($endevina < $ocult) {// caso de numero mayor
                // Si el número es menor, mostrar el mensaje y el formulario nuevamente
                echo "<p>El número introducido es menor que el número oculto. ¡Intenta nuevamente!</p>";
                echo '
                    <form method="POST" action="ex41pagina3.php">
                        <label for="endevina">Introduce un número:</label>
                        <input type="number" name="endevina" required />
                        <input type="submit" value="Endevinar" />
                    </form>
                ';
            } else {//caso de numero menor
                // Si el número es mayor, mostrar el mensaje y el formulario nuevamente
                echo "<p>El número introducido es mayor que el número oculto. ¡Intenta nuevamente!</p>";
                echo '
                    <form method="POST" action="ex41pagina3.php">
                        <label for="endevina">Introduce un número:</label>
                        <input type="number" name="endevina" required />
                        <input type="submit" value="Endevinar" />
                    </form>
                ';
            }
        } else {
            // Mostrar el formulario para la primera adivinanza
            echo '
                <form method="POST" action="ex41pagina3.php">
                    <label for="endevina">Introduce un número:</label>
                    <input type="number" name="endevina" required />
                    <input type="submit" value="Endevinar" />
                </form>
            ';
        }
    } else {
        // Si no existe el número oculto en la sesión te manda a la pg1
        echo "<p>No se ha registrado ningún número oculto.</p>";
        echo '<a href="ex41pagina1.php">Volver a la página principal</a>';
    }
    ?>
</body>
</html>
