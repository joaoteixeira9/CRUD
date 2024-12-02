<?php
    include "conexao.php";

    // Consultar os dados da tabela agenda
    $sql = "SELECT * FROM agenda";
    $res = mysqli_query($conexao, $sql);

    // Exibir a tabela com os resultados
    echo "<table border='2'>
            <tr>
                <th>Cliente</th>
                <th>Profissional</th>
                <th>Servico</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Valor</th>
            </tr>";
    
    // Loop para exibir os dados da agenda
    while ($linha = mysqli_fetch_assoc($res)) {
        // Buscar o nome do cliente
        $clienteId = $linha['clienteId']; // Presumindo que 'clienteId' é o campo na tabela agenda
        $sqlCliente = "SELECT nome FROM clientes WHERE id = $clienteId";
        $resultCliente = mysqli_query($conexao, $sqlCliente);
        $linhaCliente = mysqli_fetch_assoc($resultCliente);
        $nomeCliente = $linhaCliente['nome'];

        // Buscar o nome do profissional
        $profissionalId = $linha['profissionalId']; // Presumindo que 'profissionalId' é o campo na tabela agenda
        $sqlProfissional = "SELECT nome FROM funcionarios WHERE id = $profissionalId";
        $resultProfissional = mysqli_query($conexao, $sqlProfissional);
        $linhaProfissional = mysqli_fetch_assoc($resultProfissional);
        $nomeProfissional = $linhaProfissional['nome'];

        // Buscar o nome do serviço e o preço
        $servicoId = $linha['servicoId']; // Presumindo que 'servicoId' é o campo na tabela agenda
        $sqlServico = "SELECT servico, preco FROM servicos WHERE id = $servicoId";
        $resultServico = mysqli_query($conexao, $sqlServico);
        $linhaServico = mysqli_fetch_assoc($resultServico);
        $servico = $linhaServico['servico'];
        $preco = $linhaServico['preco'];

        $horarioId = $linha['horarioId']; // Presumindo que 'clienteId' é o campo na tabela agenda
        $sqlHorario = "SELECT * FROM horarios WHERE id = $horarioId";
        $resultHorario = mysqli_query($conexao, $sqlHorario);
        $linhaHorario = mysqli_fetch_assoc($resultHorario);
        $horario = $linhaHorario['horario'];
        // Exibir os dados da agenda na tabela
        echo "<tr>"; // começo de coluna
        echo "<td> $nomeCliente</td>";
        echo "<td> $nomeProfissional</td>";
        echo "<td> $servico </td>";
        echo "<td> {$linha['data']}</td>";
        echo "<td> $horario</td>";
        echo "<td> $preco</td>";
        echo "</tr>"; // fim da coluna
    }

    mysqli_close($conexao);
?>
