<?php
header("Content-Type: text/css");

?>

@import url("../../../../variables.css?v=<?php echo time(); ?>");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
}
      .navbar {
    font-family: "Sour Gummy", serif;

        background: rgba(255, 255, 255, 0.6);
        border-radius: 0 0 10px 10px;
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
  font-weight:700;

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
         .shop_link {
    margin-top: 45px; /* Ajusta este valor según el espacio necesario */
  }
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
body {
  background: var(--bg-color);
  background: radial-gradient(circle, var(--bg-color) 50%, #aff8d6 100%);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
}

main {
  font-family: "Roboto", sans-serif;

  width: 100%;
  padding: 20px;
  margin: auto;
  margin-top: 60px;
}

.main_container {
  width: 100%;
  max-width: 800px;
  margin: auto;
  position: relative;
}

.background_box {
  width: 100%;
  padding: 10px 20px;
  display: flex;
  justify-content: center;
  backdrop-filter: blur(5px);
  background-color: rgba(0, 128, 136, 0.6);
  border-radius: 26px;
}

.background_box div {
  margin: 100px 40px;
  color: white;
  transition: all 500ms;
}

.background_box div p,
.background_box div button {
  margin-top: 30px;
}

.background_box div h3 {
  font-weight: 400;
  font-size: 26px;
}

.background_box div button {
  padding: 10px 40px;
  border: 2px solid white;
  background: transparent;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  color: white;
  outline: none;
  transition: all 300ms;
  border-radius: 5px;
}

.background_box div button:hover {
  background: white;
  color: rgba(0, 128, 136, 0.6);
}

.login_register_container {
  display: flex;
  align-items: center;
  width: 100%;
  max-width: 380px;
  position: relative;
  top: -185px;
  left: 10px;
  transition: left 500ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.login_register_container form {
  width: 100%;
  padding: 80px 20px;
  background: white;
  position: absolute;
  border-radius: 20px;
}

.login_register_container form h2 {
  font-size: 30px;
  text-align: center;
  margin-bottom: 20px;
  color: rgba(0, 128, 136, 0.6);
}

.login_register_container form input {
  width: 100%;
  margin-top: 20px;
  padding: 10px;
  border: none;
  border-radius: 7px;
  background: #ebe9e9;
  font-size: 16px;
  outline: none;
}

.login_register_container form button {
  padding: 10px 40px;
  border: none;
  margin-top: 40px;
  font-size: 14px;
  background: rgba(0, 128, 136, 0.6);
  transition: all 300ms;
  color: white;
  cursor: pointer;
  border-radius: 7px;
  outline: none;
}

.login_form {
  display: block;
  opacity: 1;
}
.register_form {
  display: none;
}

.login_register_container form button:hover {
  background-color: #46a2fd;
}

@media screen and (max-width: 780px) {
  main {
    margin-top: 20px;
  }
  .background_box {
    max-width: 350px;
    height: 300px;
    flex-direction: column;
    margin: auto;
  }

  .background_box div {
    margin: 0;
    position: absolute;
  }

  .login_register_container {
    top: -10px;
    left: -5px;
    margin: auto;
  }

  .login_register_container form {
    position: relative;
  }
}
