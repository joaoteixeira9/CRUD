<?php
    include "conexao.php";

    $clienteId = $_GET["id"];
    $profissionalId = $_POST["profissional"];
    $servicoId = $_POST["servico"];
    $data = $_POST["data"];
    $horarioId = $_POST["horario"];

    $sql = "INSERT INTO agenda (clienteId, profissionalId, servicoId, data, horarioId) VALUES ($clienteId,$profissionalId, $servicoId, '$data' , $horarioId)";
    $res = mysqli_query($conexao, $sql);
    echo $sql;
    mysqli_close($conexao);

?>