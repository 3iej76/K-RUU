<?php
header("Content-Type: text/css");



?>


@import url(./variables.css?v=<?php echo time(); ?>);
* {
  margin: 0;
  padding: 0;
  font-family: "Sour Gummy", serif;
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
  opacity: 1;
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
  font-weight:700;
}

.navbar-left::after {
  content: "";
  flex-grow: 1;
}

/* Menú para escritorio */
.navbar-links {
  display: flex; /* Menú visible para escritorio */
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

/* Menú para escritorio */
.navbar-links {
  display: flex; /* Menú visible para escritorio */
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

/* Menú móvil oculto por defecto */
.navbar-links.mobile {
  display: none; /* Ocultar por defecto en móviles */
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
  z-index: 10; /* Asegurar que el menú esté encima de otros elementos */
  transform: translateX(100%); /* Iniciar fuera de la pantalla */
  transition: transform 0.3s ease; /* Transición suave */
}

/* Barra de navegación para móvil */
.navbar-toggle {
  display: none; /* Ocultar el icono de hamburguesa por defecto en pantallas grandes */
  cursor: pointer;
  z-index: 20; /* Asegurar que el ícono esté encima del menú */
  position: absolute; /* Fijar la posición del ícono */
  top: 20px; /* Ajusta la distancia desde la parte superior */
  right: 20px; /* Ajusta la distancia desde la parte derecha */
  margin-right: 10px; /* Evita que el ícono toque los bordes */
}

.navbar-toggle .bar {
  display: block;
  width: 25px;
  height: 3px;
  margin: 5px auto;
  background-color: #333;
  transition: all 0.3s ease;
}

/* Responsivo: en pantallas pequeñas */
@media (max-width: 768px) {
  /* Ocultar los enlaces del menú de escritorio en móviles */
  .navbar-links {
    display: none;
  }

  /* Mostrar el ícono hamburguesa en pantallas pequeñas */
  .navbar-toggle {
    display: block;
  }

  /* Mostrar el menú móvil cuando tiene la clase active */
  .navbar-links.mobile.active {
    display: flex; /* Solo se muestra si tiene la clase active */
    transform: translateX(0); /* Trae el menú a la vista */
  }

  /* Agregar espacio superior a los enlaces en el menú móvil */
  .shop_link {
    margin-top: 45px; /* Ajusta este valor según el espacio necesario */
  }
}

.no-scroll {
  overflow: hidden;
}

body {
  background: var(--bg-color);
}

.product {
  border-radius: 10px;
  position: relative;
  overflow: hidden;
  padding: 5px 0;
  margin: 0 50px;
  background: var(--slider-color);
}

.product-category {
  padding: 0 10vw;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 20px;
  margin-top: 10px;
  text-transform: capitalize;
}

.product-container {
  padding: 0 9vw;
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
}

.product-container::-webkit-scrollbar {
  display: none;
}

.product-card {
  flex: 0 0 auto;
  width: 250px;
  height: 450px;
  margin-right: 40px;
}

.product-image {
  position: relative;
  width: 100%;
  height: 350px;
  overflow: hidden;
}

.product-thumb {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.discount-tag {
  position: absolute;
  background: #fff;
  padding: 5px;
  border-radius: 5px;
  color: #008088;
  right: 10px;
  top: 10px;
  text-transform: capitalize;
}

.card-btn {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  padding: 10px;
  width: 90%;
  text-transform: capitalize;
  border: none;
  outline: none;
  background: #fff;
  border-radius: 5px;
  transition: 0.5s;
  cursor: pointer;
  opacity: 0;
}

.product-card:hover .card-btn {
  opacity: 1;
}

.card-btn:hover {
  background: #008088;
  color: #fff;
}

.product-info {
  width: 100%;
  height: 100px;
  padding-top: 10px;
}

.product-brand {
  text-transform: uppercase;
}

.product-short-description {
  width: 100%;
  height: 20px;
  line-height: 20px;
  overflow: hidden;
  opacity: 0.5;
  margin: 5px 0;
}

.price {
  font-size: 20px;
  font-weight: 800;
}

.actual-price {
  margin-left: 20px;
  opacity: 0.5;
  text-decoration: line-through;
}
@media (min-width: 720px) {
  .pre-btn,
  .nxt-btn {
    background: linear-gradient(
      90deg,
      rgba(255, 255, 255, 0) 0%,
      var(--bg-color) 100%
    );
  }
}
.pre-btn,
.nxt-btn {
  border: none;
  width: 70px;
  height: 100%;
  position: absolute;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  z-index: 8;
  background-color: var(--slider-color);
}

@media (max-width: 720px) {
  .pre-btn,
  .nxt-btn {
      width: 25px;
    background: linear-gradient(
      90deg,
      rgba(255, 255, 255, 0) 0%,
      var(--bg-color) 100%
    );
  }
}

.pre-btn {
  left: 0;
  transform: rotate(180deg);
}

.nxt-btn {
  right: 0;
}

.pre-btn img,
.nxt-btn img {
  opacity: 0.4;
}

.pre-btn:hover img,
.nxt-btn:hover img {
  opacity: 1;
  transition: 0.5s;
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

/* Contenedor principal */
.grid-container {
    width: 100%;
    box-sizing: border-box;
    padding: 0 20px; /* Padding lateral en lugar de margen */
}

/* Estilos para los textos */
.catalog_text,
.work_text {
    font-weight: 300;
    background-color: #e3f6f9;
    box-sizing: border-box;
    position: relative;
    height: 91.6px;
    padding: 20px;
    padding-bottom: 30px;
    border-radius: 14px 14px 0 0;
    margin-top: 20px;
}

/* Estilos para los grids */
.product-grid_catalog,
.product-grid_work {
    z-index: 1;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Dos columnas */
    border-radius: 14px;
    background: #e3f6f9;
    position: relative;
    margin-top: -10px;
    gap: 20px;
    height: auto;
    text-decoration: none;
    box-sizing: border-box;
    border-width: 2px 0 0;
    border-style: solid;
    border-color: rgba(0, 0, 0, 0.3);
}

/* Estilos para las imágenes dentro de los grids */
.product-card_catalog img,
.product-card_work img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
}

/* Estilos para las tarjetas de producto */
.product-card_catalog,
.product-card_work {
    width: 100%;
    display: flex;
    flex-direction: column;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    box-sizing: border-box;
}

/* Versión móvil (por defecto) */
.catalog-section,
.work-section {
    width: 100%; /* Ocupa el 100% del ancho en móvil */
}
/* Redimensionar las imágenes un 50% más pequeñas */
.product-card_catalog img,
.product-card_work img {
    height: auto; /* Mantener la proporción de la imagen */
    object-fit: cover;
    border-radius: 10px;
}
/* Versión de escritorio (>1100px) */
@media (min-width: 1100px) {
    .grid-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Espacio entre las secciones */
    }

    .catalog-section,
    .work-section {
        width: calc(50% - 10px); /* Ocupa el 50% del ancho menos el espacio del gap */
    }

    .catalog_text,
    .work_text {
        width: 100%; /* Ocupa el 100% del ancho del contenedor */
    }

    .product-grid_catalog,
    .product-grid_work {
        width: 100%; /* Ocupa el 100% del ancho del contenedor */
    }
}