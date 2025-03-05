<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// Definir las rutas válidas
$valid_routes = ['es', 'en', '', '/']; // Añadir las rutas válidas

// Obtener la ruta solicitada
$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Comprobar si la ruta solicitada existe
if (!in_array($request_uri, $valid_routes)) {
    // Si la ruta no es válida, redirigir a la página 404
    header("HTTP/1.1 404 Not Found");
    include('404.php');  // Incluye el archivo 404.php
    exit();  // Detener el procesamiento
}

// Continuar con la lógica normal si la ruta es válida
// Por ejemplo, cargar contenido para /es, /en, /shop, etc.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Expires" content="0">

<meta http-equiv="Last-Modified" content="0">

<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

<meta http-equiv="Pragma" content="no-cache">
  <title>Document</title>
</head>
<body>

  <script>
    // Redirección automática en el dominio principal
    if (window.location.pathname === '/' || window.location.pathname === '' || window.location.pathname === '/index.html') {
      const userLang = navigator.language || navigator.userLanguage;
      if (userLang.startsWith('es')) {
        window.location.href = '/es';
      } else {
        window.location.href = '/en';
      }
    }
    </script>  
</body>
</html>


