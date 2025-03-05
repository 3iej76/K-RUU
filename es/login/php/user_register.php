<?php

include('connection_sql.php');


$full_name = $_POST['full_name'];
$email = $_POST['email'];
$user = $_POST['user'];
$password = $_POST['password'];
$encrypted_password = hash('sha512', $password);

$query = "INSERT INTO users (full_name, email, user, password) VALUES ('$full_name', '$email', '$user', '$encrypted_password')";


$verify_repeated_email = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
$verify_repeated_user = mysqli_query($connection, "SELECT * FROM users WHERE user = '$user'");

if (mysqli_num_rows($verify_repeated_email) > 0) {
    echo "
    <script>
        alert('Este correo ya esta registrado, intenta con otro');
        window.location = '../';
    </script>
    ";
    exit();
}

if (mysqli_num_rows($verify_repeated_user) > 0) {
    echo "
    <script>
        alert('Este usuario ya esta registrado, intenta con otro');
        window.location = '../';
    </script>
    ";
    exit();
}



$execute = mysqli_query($connection, $query);

if ($execute) {
    echo "
    <script>
        alert('Usuario registrado correctamente');
        window.location = '../';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Error al registrar usuario, vuelve a intertarlo');
        window.location = '../';
    </script>
    ";
}

mysqli_close($connection);