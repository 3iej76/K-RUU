<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
$user = $_SESSION['user'];
$valid_routes = ['', 'es/shop']; // Añadir las rutas válidas

// Obtener la ruta solicitada
$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Comprobar si la ruta solicitada existe
if (!in_array($request_uri, $valid_routes)) {
  // Si la ruta no es válida, redirigir a la página 404
  header("HTTP/1.1 404 Not Found");
  include('../../404.php');  // Incluye el archivo 404.php
  exit();  // Detener el procesamiento
}
if (!isset($user)) {
  echo '
        <script>
             alert("Inicia sesión para acceder a la tienda");
             window.location = "../login/";
        </script>';
  session_destroy();
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>K-RUU Store</title>
    <style>
      @import url(../../variables.css?v=<?php echo time(); ?>);
      * {
        margin: 0;
        padding: 0;
        font-family: "Sour Gummy", serif;
      }
      body {
        background: var(--bg-color);
        margin: 0;
        padding: 0;
      }

      .navbar {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 0 0 10px 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px 20px;
        text-transform: capitalize;
        position: relative;
      }

      .navbar-left {
        display: flex;
        align-items: center;
        flex-grow: 1;
      }

      .navbar-logo {
        border-radius: 5px;
        height: 50px;
        margin-right: 10px;
      }

      .navbar-title {
        margin: 0;
        padding: 0;
        font-size: 36px;
        font-weight: 700;
      }

      .navbar-left::after {
        content: "";
        flex-grow: 1;
      }

      .navbar-links {
        display: flex;
        gap: 15px;
      }

      .navbar-links a {
        text-decoration: none;
        font-size: 16px;
        color: #333;
        transition: color 0.3s;
      }

      .navbar-links a:hover {
        color: #007bff;
      }

      .navbar-links.mobile {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.9);
        height: 100vh;
        width: 250px;
        flex-direction: column;
        align-items: flex-end;
        padding: 20px;
        gap: 15px;
        z-index: 10;
        transform: translateX(100%);
        transition: transform 0.3s ease;
      }

      .navbar-toggle {
        display: none;
        cursor: pointer;
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 20; /* Ensure the icon is above the menu */
      }

      .navbar-toggle .bar {
        display: block;
        width: 25px;
        height: 3px;
        margin: 5px auto;
        background-color: #333;
        transition: all 0.3s ease;
      }

      @media (max-width: 768px) {
        .navbar-links {
          display: none;
        }

        .navbar-toggle {
          display: block;
        }

        .navbar-links.mobile.active {
          display: flex;
          transform: translateX(0);
        }
      }
      .welcome {
          display:flex;
          position:relative;
        flex-direction:row;
        justify-content:space-between;
      }
      .logout {
              color:var(--navbar-color);
          align-items: flex-end;
      }
          .logout_link {
              color:var(--navbar-color);
      }
          .logout_link:hover {
              cursor:pointer;
              color:rgba(0,0,0, .25);
              transition:all 300ms;
      }
   

      .product-grid {
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(
          auto-fill,
          minmax(220px, 1fr)
        ); /* Responsive to fit small screens */
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.6);
        position: relative;
        margin: 0 20px;
        gap: 20px;
        height: auto;
      }

      .product-card {
        width: 100%;
        max-width: 270px;
        height: auto;
        position: relative;
      }

      .product-card_shop {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
      }

      .product-card_shop:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      }

      .product-title_shop {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
      }

      .product-short-description {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
      }

      .product-price_shop {
        font-size: 18px;
        font-weight: 700;
        color: #008088;
        margin-bottom: 10px;
      }

      .card-btn {
        position: absolute;
        bottom: 20px; /* Button at the bottom */
        left: 50%;
        transform: translateX(-50%);
        padding: 10px;
        width: 80%;
        text-transform: capitalize;
        border: none;
        outline: none;
        background: #008088;
        border-radius: 5px;
        transition: 0.5s;
        cursor: pointer;
        opacity: 0;
        z-index: 1;
      }

      .product-card_shop:hover .card-btn {
        opacity: 1;
      }

      .card-btn:hover {
        background: #005f5f;
        color: #fff;
      }

      .lang-btn {
        padding: 5px 10px;
        background-color: #008088;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-transform: capitalize;
      }

      .lang-btn:hover {
        background-color: #005f5f;
      }
      .shop_link {
        margin-top: 45px;
      }
    </style>
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
    <div class="welcome">    <h1 class="welcome_text">Bienvenido, <?php echo htmlspecialchars($user); ?></h1>

    <h1 class="logout"><a class="logout_link" href="../login/php/logout.php">Cerrar sesion</a></h1></div>


    <div class="product-grid">
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card1.jpg"
            alt="Product 1"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
      <div class="product-card">
        <a href="#" class="product-card_shop">
          <img
            src="../../images/card2.jpg"
            alt="Product 2"
            class="product-image_shop"
          />
          <h3 class="product-title_shop">Product Name</h3>
          <p class="product-short-description">
            Short description of the product that helps to understand what it is.
          </p>
          <p class="product-price_shop">$19.99</p>
          <button class="card-btn">More Info</button>
        </a>
      </div>
    </div>

    <script>
      const toggleButton = document.querySelector(".navbar-toggle");
      const mobileMenu = document.querySelector(".navbar-links.mobile");
      const langToggle = document.getElementById("lang-toggle");
      const langToggleShop = document.getElementById("lang-toggle_shop");

      toggleButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("active");
        document.body.classList.toggle("no-scroll");
      });

      const currentPath = window.location.pathname.replace(/\/$/, "");
      if (langToggle && langToggleShop) {
        if (currentPath.startsWith("/en")) {
          langToggle.textContent = "ES";
          langToggleShop.textContent = "ES";
        } else {
          langToggle.textContent = "EN";
          langToggleShop.textContent = "EN";
        }
      }

      const changeLanguage = () => {
        if (currentPath.startsWith("/en")) {
          window.location.href = currentPath.replace("/en", "/es");
        } else if (currentPath.startsWith("/es")) {
          window.location.href = currentPath.replace("/es", "/en");
        } else {
          window.location.href = "/es";
        }
      };

      if (langToggle) {
        langToggle.addEventListener("click", (event) => {
          event.preventDefault();
          changeLanguage();
        });
      }

      if (langToggleShop) {
        langToggleShop.addEventListener("click", (event) => {
          event.preventDefault();
          changeLanguage();
        });
      }
    </script>
  </body>
</html>
