<link rel="stylesheet" href="../css/agenda-listar.css">
        <?php 
        include "../includes/header.php"; 
        include "../includes/conexao.php";
        echo "<br>";

        $dataFiltro = $_GET['dataFiltro'] ?? "";
        if($dataFiltro != ""){
            $dataFiltro = "where data = '$dataFiltro'";
        }

        // Consulta a tabela agenda
        $data = date('Y-m-d');
        $sql = "SELECT * FROM agenda_16 " . $dataFiltro;
        $res = mysqli_query($conexao, $sql);

        $sqlData = "SELECT distinct data FROM agenda_16";
        $resData = mysqli_query($conexao, $sqlData);
        echo "<div class='container text-center my-4'>";
        echo "<h2 class='display-4'>Visualize sua agenda</h2>";
        echo "</div>";

        echo "<div class='d-flex flex-wrap me-2 mb-4 justify-content-center align-items-center'>";
        while ($linha = mysqli_fetch_assoc($resData)) {
            echo " <a href='agenda-listar-16.php?dataFiltro=".$linha['data']."'><button class='btn'>" . date('d/m/Y', strtotime($linha['data'])) . "</button></a> " ;
        }
        echo "</div>";
        // Início da tabela
        echo "<div class='tabelaAgenda' style='width: 70%; display: flex; justify-content: center;  margin: 0 auto;'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead style='background-color: #34495e; color: white;'>
                <tr>
                    <th>Cliente</th>
                    <th>Profissional</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Valor</th>
                </tr>
            </thead>";
        echo "<tbody>";

        while ($linha = mysqli_fetch_assoc($res)) {
            // Buscar o nome do cliente
            $clienteId = $linha['clienteId'];
            $sqlCliente = "SELECT nome FROM clientes WHERE id = $clienteId";
            $resCliente = mysqli_query($conexao, $sqlCliente);
            $linhaCliente = mysqli_fetch_assoc($resCliente);
            $nomeCliente = $linhaCliente['nome'];

            // Buscar o nome do profissional
            $profissionalId = $linha['profissionalId']; 
            $sqlProfissional = "SELECT nome FROM clientes WHERE id = $profissionalId";
            $resProfissional = mysqli_query($conexao, $sqlProfissional);
            $linhaProfissional = mysqli_fetch_assoc($resProfissional);
            $nomeProfissional = $linhaProfissional['nome'];

            // Buscar o serviço e o preço
            $servicoId = $linha['servicoId']; 
            $sqlServico = "SELECT servico, preco FROM servicos WHERE id = $servicoId";
            $resServico = mysqli_query($conexao, $sqlServico);
            $linhaServico = mysqli_fetch_assoc($resServico);
            $servico = $linhaServico['servico'];
            $preco = $linhaServico['preco'];

            // Exibir a linha da tabela com os dados
            echo "<tr>
                <td>$nomeCliente</td>
                <td>$nomeProfissional</td>
                <td>$servico</td>
                <td>" . date('d/m/Y', strtotime($linha['data'])) . "</td>
                <td>{$linha['horarioId']}</td>
                <td>$preco</td>
            </tr>";
        }

        // Fechar a tabela
        echo "</tbody></table>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
        // Fechar a conexão com o banco de dados
        mysqli_close($conexao);

        ?>
        <?php include "../includes/footer.php"; ?>