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

            echo "<br><br><label>Data: <input type='date' id='dataSelecionada'  name='data'></label>";

            function gerarHorarios($inicio, $fim, $intervalo) {
                $horarios = [];
                $inicioTimestamp = strtotime($inicio);
                $fimTimestamp = strtotime($fim);
                
                while ($inicioTimestamp <= $fimTimestamp) {
                    $horarios[] = date('H:i', $inicioTimestamp); // Formato consistente: HH:mm
                    $inicioTimestamp = strtotime("+$intervalo minutes", $inicioTimestamp);
                }
                
                return $horarios;
            }
            $horariosDisponiveis = gerarHorarios('09:00', '17:00', 30);
            $sql = "SELECT * FROM agenda";
            $res = mysqli_query($conexao, $sql);
            $reservados = [];
            while($l = mysqli_fetch_assoc($res)){
                $reservados[] = [
                    'data' => $l['data'],
                    'horarioId' => $l['horarioId']
                ];
            }
            echo "<script>var horariosReservados = " . json_encode($reservados) . ";</script>";
            echo "<br><br><label>Selecione um horário:</label>";
            echo "<div style='display: flex; gap: 10px; flex-wrap: wrap;'>";

            // Exibir botões para cada horário disponível
            foreach ($horariosDisponiveis as $horario) {
                echo "<button type='button' id='horario_{$horario}' name='horario' onclick=\"selecionarHorario('$horario')\" style='padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;'>";
                echo "$horario";
                echo "</button>";
            }
            echo "</div>";
            echo "</div>";
            echo "<input type='hidden' id='horarioSelecionado' name='horario'>";

            echo "<br><br><button type='submit'>Agendar</button><br><br>";
            
        }
        ?>
    </form>
</main>
<script>
function selecionarHorario(horarioId) {
    document.getElementById('horarioSelecionado').value = horarioId;
    const botoes = document.querySelectorAll("button[type='button']");
    botoes.forEach(btn => btn.style.backgroundColor = '#007BFF');
    const botaoSelecionado = document.getElementById('horario_' + horarioId);
    botaoSelecionado.style.backgroundColor = '#000000';
}

function verificarHorariosReservados(reservados) {
}
</script>
<?php include "footer.php";
