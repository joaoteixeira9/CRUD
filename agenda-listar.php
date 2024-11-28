<?php
    include "header.php";
    include "conexao.php";
?>
<main>
    <h2>Agendamento</h2>
        <?php
            $sql = "SELECT * FROM funcionarios";
            $res = mysqli_query($conexao, $sql);
            echo "<label> Selecione um profissional: </label> <br>";
            echo "<select name='profissional'>";
            while($l = mysqli_fetch_assoc($res)){
                echo "<option value='{$l['id']}'> {$l['nome']} </option>";
            }
            echo "</select>";
            
            echo "<table border='2'>
            <tr>
            <th>SERVIÇO</th>
            <th>DESCRIÇÃO</th>
            <th>PREÇO</th>
            <th>CATEGORIA</th>
            </tr>";
            $sql = "select * from servicos";
            $resultado = mysqli_query($conexao, $sql);
            echo "<br><br>";

            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>"; //começo coluna
                echo "<td> {$linha['servico']} </td>"; // {} => interpolação de strings
                echo "<td> {$linha['descricao']} </td>";
                echo "<td> {$linha['preco']} </td>";
                echo "<td> {$linha['categoria']} </td>";
                echo "</tr>";
            }
            echo "</table>";
            $sql = "SELECT * FROM servicos";
            $res = mysqli_query($conexao, $sql);
            echo "<br><label> Selecione um serviço: </label><br>";
            echo "<select name='servico'>";
            while($l = mysqli_fetch_assoc($res)){
                echo "<option value='{$l['id']}'> {$l['servico']} - {$l['preco']}</option>";
            }
            echo "</select>";

            $diasDaSemana = [
                "Segunda-feira", 
                "Terça-feira", 
                "Quarta-feira", 
                "Quinta-feira", 
                "Sexta-feira", 
                "Sábado"
            ];
         
            echo "<br><br><label>Escolha um dia da semana:</label><br>";
            echo "<select name='dia'>";
            foreach ($diasDaSemana as $dia) {
                echo "<option value='$dia'>$dia</option>";
            }
            echo "</select>";
            
        ?>
</main>
<?php include "footer.php";