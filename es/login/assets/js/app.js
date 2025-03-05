document.getElementById("register_button").addEventListener("click", register);
document.getElementById("login_button").addEventListener("click", login);
window.addEventListener("resize", pageWidth);

const login_form = document.querySelector(".login_form");
const register_form = document.querySelector(".register_form");
const login_register_container = document.querySelector(".login_register_container");
const register_box = document.querySelector(".register_box");
const login_box = document.querySelector(".login_box");
  // Selectores para el menú hamburguesa
  const toggleButton = document.querySelector(".navbar-toggle");
  const mobileMenu = document.querySelector(".navbar-links.mobile");

  // Selectores para los botones de cambio de idioma
  const langToggle = document.getElementById("lang-toggle");
  const langToggleShop = document.getElementById("lang-toggle_shop");

let activeForm = "login";  // Por defecto, el formulario activo es el login

function pageWidth() {
    if (window.innerWidth > 780) {
        // Ambos boxes visibles en pantallas grandes
        login_box.style.display = "block";
        register_box.style.display = "block";
        
        // Ajustar posición del contenedor según el formulario activo
        login_register_container.style.left = activeForm === "register" ? "410px" : "10px";

        // Mantener el formulario activo
        login_form.style.display = activeForm === "login" ? "block" : "none";
        register_form.style.display = activeForm === "register" ? "block" : "none";

        // Ajustar opacidades
        register_box.style.opacity = activeForm === "register" ? "0" : "1";
        login_box.style.opacity = activeForm === "login" ? "0" : "1";

    } else {
        // Solo un box visible en pantallas pequeñas
        login_register_container.style.left = "0px";  // Asegura el left correcto en <780px

        if (activeForm === "register") {
            register_box.style.display = "none";
            login_box.style.display = "block";
        } else {
            register_box.style.display = "block";
            login_box.style.display = "none";
        }

        // Mantener el formulario activo
        login_form.style.display = activeForm === "login" ? "block" : "none";
        register_form.style.display = activeForm === "register" ? "block" : "none";
    }
}
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


// Función para el botón de registro
function register() {
    activeForm = "register";  // Actualiza el formulario activo

    if (window.innerWidth > 780) {
        login_register_container.style.left = "410px";
        login_form.style.display = "none";
        register_form.style.display = "block";
        register_box.style.opacity = "0";
        login_box.style.opacity = "1";
    } else {
        login_register_container.style.left = "0px";
        register_box.style.display = "none";
        login_box.style.display = "block";
        login_form.style.display = "none";
        register_form.style.display = "block";
    }
}

// Función para el botón de login
function login() {
    activeForm = "login";  // Actualiza el formulario activo

    if (window.innerWidth > 780) {
        login_register_container.style.left = "10px";
        login_form.style.display = "block";
        register_form.style.display = "none";
        register_box.style.opacity = "1";
        login_box.style.opacity = "0";
    } else {
        login_register_container.style.left = "0px";
        register_box.style.display = "block";
        login_box.style.display = "none";
        login_form.style.display = "block";
        register_form.style.display = "none";
    }
}

// Inicialización al cargar la página
pageWidth();
