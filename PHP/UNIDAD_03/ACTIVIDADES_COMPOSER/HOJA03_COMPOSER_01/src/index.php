<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de IBAN</title>
</head>
<body>
    <h1>Validacion de IBAN</h1>
        <form action="validate.php" method="post">
        <label for="iban">Introduce el código IBAN; </label>
        <input type="text" id="iban" name="iban" required>
        <input type="submit" name ="validar" value="Validar">
        </form>
    
</body>
</html>