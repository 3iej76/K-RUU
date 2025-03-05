<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
$valid_routes = ['login', 'about _us', 'shop', 'sustainability', '', 'es']; // Añadir las rutas válidas

// Obtener la ruta solicitada
$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Comprobar si la ruta solicitada existe
if (!in_array($request_uri, $valid_routes)) {
    // Si la ruta no es válida, redirigir a la página 404
    header("HTTP/1.1 404 Not Found");
    include('../404.php');  // Incluye el archivo 404.php
    exit();  // Detener el procesamiento
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Expires" content="0">

<meta http-equiv="Last-Modified" content="0">

<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

<meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" type="text/css" href="../styles.php?v=<?php echo time(); ?>" />
    <link rel="icon" type="image/png" href="../favicon.png" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>K-RUU</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html lang="es">
      <body>
        <nav class="navbar">
          <div class="navbar-left">
            <img src="../logo.png" alt="Logo" class="navbar-logo" />
            <h1 class="navbar-title">K-RUU</h1>
          </div>
          <div class="navbar-links">
            <a href="/es/login/">Tienda</a>
            <a href="/es/about_us/">Sobre nosotros</a>
            <a href="/es/sustainability/">Sostenibilidad</a>
            <button id="lang-toggle" class="lang-btn">EN</button>
          </div>
          <div class="navbar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
          <div class="navbar-links mobile">
            <a class="shop_link" href="/es/login/">Tienda</a>
            <a href="/es/about_us/">Sobre nosotros</a>
            <a href="/es/sustainability/">Sostenibilidad</a>
            <button id="lang-toggle_shop" class="lang-btn">ES</button>
          </div>
        </nav>

        <section class="product">
          <h2 class="product-category">Nuestros productos</h2>
          <button class="pre-btn">
            <img src="../images/arrow.png" alt="" />
          </button>
          <button class="nxt-btn">
            <img src="../images/arrow.png" alt="" />
          </button>
          <div class="product-container">
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">Re-stock!</span>
                <img src="../images/card1.jpg" class="product-thumb" alt="" />
                <button class="card-btn">More information</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">k-ruu shoes v.1</h2>
                <p class="product-short-description">
                  Hechos con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card2.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card3.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card4.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card5.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card6.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card7.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card8.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card9.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
            <div class="product-card">
              <div class="product-image">
                <span class="discount-tag">50% de descuento</span>
                <img src="../images/card10.jpg" class="product-thumb" alt="" />
                <button class="card-btn">Compra ahora</button>
              </div>
              <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                  Hecha con tela 100% reciclada
                </p>
                <span class="price">20€</span
                ><span class="actual-price">40€</span>
              </div>
            </div>
          </div>
        </section>
<div class="grid-container">
    <!-- Texto y grid del catálogo -->
    <div class="catalog-section">
        <h1 class="catalog_text">Fotos del catalogo</h1>
        <div class="product-grid_catalog">
            <div class="product-card_catalog">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_catalog"
                />
            </div>
            <div class="product-card_catalog">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_catalog"
                />
            </div>
            <div class="product-card_catalog">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_catalog"
                />
            </div>
            <div class="product-card_catalog">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_catalog"
                />
            </div>
        </div>
    </div>

    <!-- Texto y grid del trabajo -->
    <div class="work-section">
        <h1 class="work_text">Fotos del trabajo</h1>
        <div class="product-grid_work">
            <div class="product-card_work">
                <img
                    src="../images/work1.jpg"
                    alt="Product 2"
                    class="product-image_work"
                />
            </div>
            <div class="product-card_work">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_work"
                />
            </div>
            <div class="product-card_work">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_work"
                />
            </div>
            <div class="product-card_work">
                <img
                    src="https://pepinair.com/wp-content/uploads/2018/03/LongExposure-e1522337641424-256x256.jpg"
                    alt="Product 2"
                    class="product-image_work"
                />
            </div>
        </div>
    </div>
</div>
        <script src="../app.js"></script>
      </body>
    </html>
  </body>
</html>
