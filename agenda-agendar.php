<?php
    include "header.php";
    include "conexao.php";
?>
<main>
    <h2>Agendamento</h2>
    <a href="agenda-listar.php">Visualizar sua agenda</a><br><br>
        <?php 
        $sql = "SELECT * FROM clientes";
        $res = mysqli_query($conexao, $sql);
        while($l = mysqli_fetch_assoc($res)){
        
        echo "<form action='agenda-salvar.php?id={$l['id']}' method='post'>";
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

            echo "<br><br><label>Data: <input type='date' name='data'></label>";
            
            $sql = "SELECT * FROM horarios";
            $res = mysqli_query($conexao, $sql);
            echo "<br><br><label> Selecione um horário: </label>";
            echo "<select name='horario'>";
            while($l = mysqli_fetch_assoc($res)){
                echo "<option value='{$l['id']}'> {$l['horario']}</option>";
            }
            echo "</select>";

            echo "<br><br><button type='submit'>Agendar</button>";
        }
        ?>
    </form>
</main>
<?php include "footer.php";