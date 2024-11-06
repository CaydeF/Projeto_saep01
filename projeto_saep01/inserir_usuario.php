<?php  //tag php
include('conexao.php'); //
if (isset($_POST['submit'])) {
$nome = $_POST['Nome'];
$email = $_POST['Email'];

$sql = 'INSERT INTO Usuarios (Nome, Email) VALUES (?,?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);

if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $stmt->error;
}
$stmt->close();
}
$conn->close();
?>