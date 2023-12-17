<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 server</title>
</head>
<body>
    
    <?php
    // echo "<pre>";print_r($_SERVER); echo "</pre>";

    echo "<p>PHP_SELF: {$_SERVER['PHP_SELF']}</p>";
    echo "<p>SERVER_SOFTWARE: {$_SERVER['SERVER_SOFTWARE']}</p>";
    echo "<p>SERVER_NAME: {$_SERVER['SERVER_NAME']}</p>";
    echo "<p>REQUEST_METHOD: {$_SERVER['REQUEST_METHOD']}</p>";
    echo "<p>REQUEST_URI: {$_SERVER['REQUEST_URI']}</p>";
    echo "<p>QUERY_STRING: {$_SERVER['QUERY_STRING']}</p>";

    echo "<p>HTTP_REFERER: {$_SERVER['HTTP_REFERER']}</p>";
    ?>
</body>
</html>
