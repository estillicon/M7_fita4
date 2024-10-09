<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex42pagina1</title>
</head>
<body>
    <h1>ENREGISTRA FRASE</h1>

    
<!--con el post guardamos la info del input y la enviamos con su nombre(frase1 a la siguiente paguina-->
    <form method="POST" action="ex42pagina2.php">
            
    <input type="text" name = 'frase1' required/>

    <input type="submit" value="Enviando frase1"/>

    </form>


    
    
</body>
</html>