<?php

  session_start();
  if(isset($_SESSION['user'])){
      header("Location: ../shop");
  }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/styles.php?v=<?php echo time(); ?>" />
      <link rel="icon" type="image/x-icon" href="../../favicon.png">
      </head>
  <body>
      <nav class="navbar">
      <div class="navbar-left">
        <img src="../../logo.png" alt="Logo" class="navbar-logo" />
        <h1 class="navbar-title">K-RUU</h1>
      </div>
      <div class="navbar-links">
        <a href="../">K-RUU</a>
        <a href="/about_us/">About Us</a>
        <a href="/sustainability/">Sustainability</a>
        <button id="lang-toggle" class="lang-btn">EN</button>
      </div>
      <div class="navbar-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <div class="navbar-links mobile">
        <a class="shop_link" href="../">K-RUU</a>
        <a href="/about_us/">About Us</a>
        <a href="/sustainability/">Sustainability</a>
        <button id="lang-toggle_shop" class="lang-btn">ES</button>
      </div>
    </nav>
    <main>

      <div class="main_container">
        <div class="background_box">
          <div class="login_box">
            <h3>¿Ya tienes cuenta?</h3>
            <p>Iniciar sesión para entrar en la tienda</p>
            <button id="login_button">Iniciar sesión</button>
          </div>
          <div class="register_box">
            <h3>¿Aun no tienes cuenta?</h3>
            <p>Crea una cuenta nueva</p>
            <button id="register_button">Registrarse</button>
          </div>
        </div>

        <div class="login_register_container">
          <form action="php/user_login.php" method="POST" class="login_form">
            <h2>Iniciar sesion</h2>
            <input type="text" placeholder="Correo electronico" name="user" />
            <input type="password" placeholder="Contraseña" name="password" />
            <button>Entrar</button>
          </form>
          <form action="php/user_register_db.php" method="POST" class="register_form">
            <h2>Registrarse</h2>
            <input type="text" placeholder="Nombre completo" name="full_name" />
            <input type="email" placeholder="Correo electronico" name="email" />
            <input type="text" placeholder="Usuario" name="user" />
            <input type="password" placeholder="Contraseña" name="password" />
            <button>Registrarse</button>
          </form>
        </div>
      </div>
    </main>
    <script src="./assets/js/app.js?v=<?php echo time(); ?>"></script>
  </body>
</html>
