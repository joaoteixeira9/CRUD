<?php
$usuario = "root";
$senha = "";
$servidor = "10.125.44.38";
$porta = "3306";
$nome_bd = "bd_barbearia";

$conexao = mysqli_connect($servidor, $usuario, $senha, $nome_bd, $porta);
?>
