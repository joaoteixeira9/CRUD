<?php
    include "../../includes/conexao.php";
    session_start();
    $clienteId = $_SESSION['id'];
    $profissionalId = 4;
    $servicoId = $_POST["servico"];
    $data = $_POST["data"];
    $horarioId = $_POST["horario"];
    $sql = "INSERT INTO agenda_4 (clienteId, profissionalId, servicoId, data, horarioId) VALUES ($clienteId,'$profissionalId', $servicoId, '$data' , '$horarioId')";
    $res = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    header("Location: ./usuario-home.php");
    ?>