<?php 
include "header.php"; 
include "conexao.php";

echo "<br>";

// Consulta a tabela agenda
$sql = "SELECT * FROM agenda";
$res = mysqli_query($conexao, $sql);

// Início da tabela
echo "<table border='2'>
        <tr>
            <th>Cliente</th>
            <th>Profissional</th>
            <th>Serviço</th>
            <th>Data</th>
            <th>Horário</th>
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
            <td>{$linha['data']}</td>
            <td>{$linha['horarioId']}</td>
            <td>$preco</td>
          </tr>";
}

// Fechar a tabela
echo "</table>";
echo "<br>";
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>

<?php include "footer.php"?>