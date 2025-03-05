document.addEventListener("DOMContentLoaded", () => {
    // Selectores para el carrusel de productos
    const productContainers = [...document.querySelectorAll(".product-container")];
    const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
    const preBtn = [...document.querySelectorAll(".pre-btn")];
  
    // Selectores para el menú hamburguesa
    const toggleButton = document.querySelector(".navbar-toggle");
    const mobileMenu = document.querySelector(".navbar-links.mobile");
  
    // Selectores para los botones de cambio de idioma
    const langToggle = document.getElementById("lang-toggle");
    const langToggleShop = document.getElementById("lang-toggle_shop");
  
    // Lógica del carrusel de productos
    productContainers.forEach((item, i) => {
      let containerWidth = item.getBoundingClientRect().width;
  
      nxtBtn[i].addEventListener("click", () => {
        item.scrollLeft += containerWidth;
      });
  
      preBtn[i].addEventListener("click", () => {
        item.scrollLeft -= containerWidth;
      });
    });
  
    // Lógica del menú hamburguesa
    toggleButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("active");
      document.body.classList.toggle("no-scroll"); // Evita el scroll cuando el menú está activo
    });
  
    // Lógica para cambiar el texto del botón de idioma según la ruta actual
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
  
    // Función para verificar si la ruta existe en el servidor (usando fetch)
    const rutaExiste = async (ruta) => {
      try {
        const response = await fetch(ruta, { method: "HEAD" });
        return response.ok; // Si la respuesta es 200-299, la ruta existe
      } catch (error) {
        return false; // Si hay un error en el fetch, la ruta no existe
      }
    };
  
    // Verificamos si la ruta actual existe en el servidor
    const verificarRuta = async () => {
      const currentPath = window.location.pathname.replace(/\/$/, "");
  
      // Si la ruta no existe, redirigimos a la raíz (o la ruta principal)
      const existe = await rutaExiste(currentPath);
      if (!existe) {
        window.location.href = "/es"; // Redirigir a la raíz (cambiar según idioma)
      }
    };
  
    // Verificar ruta al cargar la página
    verificarRuta();
  
    const cambiarIdioma = () => {
      const currentPath = window.location.pathname.replace(/\/$/, "");
  
      // Redirigir al idioma adecuado si la ruta existe
      if (currentPath.startsWith("/en")) {
        const nuevaRuta = currentPath.replace("/en", "/es");
        rutaExiste(nuevaRuta).then((existe) => {
          if (existe) {
            window.location.href = nuevaRuta; // Redirige si la ruta existe
          } else {
            window.location.href = "/es"; // Redirige a la raíz si la ruta no existe
          }
        });
      } else if (currentPath.startsWith("/es")) {
        const nuevaRuta = currentPath.replace("/es", "/en");
        rutaExiste(nuevaRuta).then((existe) => {
          if (existe) {
            window.location.href = nuevaRuta;
          } else {
            window.location.href = "/en"; // Redirige a la raíz si la ruta no existe
          }
        });
      } else {
        window.location.href = "/es"; // Redirige a /es si no está en /en o /es
      }
    };
  
    // Asignar el evento de clic a los botones de cambio de idioma
    if (langToggle) {
      langToggle.addEventListener("click", (event) => {
        event.preventDefault();
        cambiarIdioma();
      });
    }
  
    if (langToggleShop) {
      langToggleShop.addEventListener("click", (event) => {
        event.preventDefault();
        cambiarIdioma();
      });
    }
  });
  