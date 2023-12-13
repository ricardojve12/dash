<?php

require("conexion_register.php");
$message = '';
if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header('Location: index.php');
    if ($stmt->execute()) {
        $message = 'Succesfully created new user';
    } else {
        $message = 'Sorry cannot create user';
    }
}
echo $message;
