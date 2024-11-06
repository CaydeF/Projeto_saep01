<?php //abertura, tag
$host = 'localhost'; //$ é a declaração de uma variavel, este é do hosteador, que é minha a propria máquina
$username = 'root';
$password = '';
$dbname = 'saep01';

$conn = new mysqli ($host,$username,$password,$dbname); //$ declarando a variavel, conn de conexão

if($conn -> connect_error){ //se a conexão falhar, vai aparecer a mensagem conexao falhou
    die('conexão falhou :('. $conn -> connect_error);
}
?> 