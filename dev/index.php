<?php
// Puedes poner lógica PHP aquí si lo necesitas
$titulo = "Mi primera página en PHP";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>

    <h1><?php echo $titulo; ?></h1>
    <p>Bienvenido a mi página web hecha con PHP.</p>

    <?php
    // Ejemplo de contenido dinámico
    echo "<p>Hoy es: " . date("d/m/Y") . "</p>";
    ?>

</body>
</html>