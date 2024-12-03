<?php
    include "conexao.php";
    include "header.php";

    echo "<br>";
    $sql = "SELECT * FROM agenda";
    $res = mysqli_query($conexao, $sql);
    echo "<table border='2'>
            <tr>
                <th>Cliente</th>
                <th>Profissional</th>
                <th>Servico</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Valor</th>
            </tr>";

    while ($linha = mysqli_fetch_assoc($res)) {
        // Buscar o nome do cliente
        $clienteId = $linha['clienteId'];
        $sqlCliente = "SELECT nome FROM clientes WHERE id = $clienteId";
        $resCliente = mysqli_query($conexao, $sqlCliente);
        $linhaCliente = mysqli_fetch_assoc($resCliente);
        $nomeCliente = $linhaCliente['nome'];

        // Buscar o nome do profissional
        $profissionalId = $linha['profissionalId']; 
        $sqlProfissional = "SELECT nome FROM funcionarios WHERE id = $profissionalId";
        $resProfissional = mysqli_query($conexao, $sqlProfissional);
        $linhaProfissional = mysqli_fetch_assoc($resProfissional);
        $nomeProfissional = $linhaProfissional['nome'];

        // Buscar o nome do serviço e o preço
        $servicoId = $linha['servicoId']; 
        $sqlServico = "SELECT servico, preco FROM servicos WHERE id = $servicoId";
        $resServico = mysqli_query($conexao, $sqlServico);
        $linhaServico = mysqli_fetch_assoc($resServico);
        $servico = $linhaServico['servico'];
        $preco = $linhaServico['preco'];

        $horarioId = $linha['horarioId'];
        $sqlHorario = "SELECT * FROM horarios WHERE id = $horarioId";
        $resHorario = mysqli_query($conexao, $sqlHorario);
        $linhaHorario = mysqli_fetch_assoc($resHorario);
        $horario = $linhaHorario['horario'];

        echo "<tr>"; // começo de coluna
        echo "<td> $nomeCliente</td>";
        echo "<td> $nomeProfissional</td>";
        echo "<td> $servico</td>";
        echo "<td> {$linha['data']}</td>";
        echo "<td> $horario</td>";
        echo "<td> $preco</td>";
        echo "</tr>"; // fim da coluna
    }

    mysqli_close($conexao);
    echo "</table>";
?>
<?php include "footer.php" ?>