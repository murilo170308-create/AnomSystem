<?php  
$host = "localhost";  
$usuario = "root";  
$senha = "usbw";  
$bd = "testeanomsystem";  
$porta = 3307;

$conn = new mysqli($host, $usuario, $senha, $bd, $porta);

mysqli_set_charset($conn, "utf8mb4");

if ($conn->connect_errno) {
    echo "Falha na conexão: (" . $conn->connect_errno . ") " . $conn->connect_error;
} else {
    // echo "Conectado com sucesso!";
}
?>
