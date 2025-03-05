<?php

session_start();


include('connection_sql.php');
$password = $_POST['password'];
$password = hash('sha512', $password);
$user = $_POST['user'];

$validate_login = mysqli_query($connection, "SELECT * FROM users WHERE user = '$user' AND password = '$password'");
if (mysqli_num_rows($validate_login) > 0) {
    $_SESSION['user'] = $user;
    echo "
    <script>
        alert('Bienvenido, $user');
        window.location = '../../shop/';
    </script>
    ";
    exit;
} else {
    echo "
    <script>
        alert('Usuario o contraseña incorrectos');
        window.location = '../';
    </script>
    ";
    exit;
}
