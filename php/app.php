<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$servername = "localhost";
$username = "prueba";
$password = "Abc_123";
$dbname = "likes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión: " . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO likes.likes_ing (likes_ing) VALUES (1)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Nuevo like insertado correctamente"]);
    } else {
        echo json_encode(["error" => "Error al insertar like: " . $conn->error]);
    }
} else {
    $sql = "SELECT COUNT(*) AS conteo FROM likes.likes_ing";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["conteo" => $row["conteo"]]);
    } else {
        echo json_encode(["conteo" => 0]);
    }
}

$conn->close();
?>
