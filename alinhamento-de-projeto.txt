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
            <th
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
            while ($l = mysqli_fetch_assoc($res)) {
                $reservados[] = [
                    'data' => $l['data'], // Certifique-se de que o formato da data é consistente
                    'horarioId' => date('H:i', strtotime($l['horarioId'])) // Converte para o formato HH:mm
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

document.addEventListener('DOMContentLoaded', function () {
    const dataInput = document.getElementById('dataSelecionada');
    const horarioInput = document.getElementById('horarioSelecionado');
    const horariosReservadosMap = {}; // Para armazenar mapeamento de data para horários

    // Constrói um mapa de horários reservados para facilitar a busca
    horariosReservados.forEach(reserva => {
        if (!horariosReservadosMap[reserva.data]) {
            horariosReservadosMap[reserva.data] = [];
        }
        horariosReservadosMap[reserva.data].push(reserva.horarioId);
    });

    // Função para verificar e esconder horários com base na data selecionada
    function verificarHorariosReservados() {
        const dataSelecionada = dataInput.value; // Data no formato AAAA-MM-DD
        const horariosReservadosDoDia = horariosReservadosMap[dataSelecionada] || [];

        // Restaura a visibilidade de todos os botões
        const botoes = document.querySelectorAll("button[type='button']");
        botoes.forEach(btn => {
            btn.style.display = 'inline-block'; // Torna todos os botões visíveis
            btn.style.backgroundColor = '#007BFF'; // Cor padrão
        });

        // Esconde os horários reservados
        horariosReservadosDoDia.forEach(horario => {
            const botao = document.getElementById('horario_' + horario);
            if (botao) {
                botao.style.display = 'none'; // Esconde o botão do horário reservado
            }
        });
    }

    // Escuta mudanças no campo de data
    dataInput.addEventListener('change', verificarHorariosReservados);

    // Inicializa verificação com a data atual
    verificarHorariosReservados();

    // Seleção de horário
    document.querySelectorAll("button[type='button']").forEach(button => {
        button.addEventListener('click', function () {
            if (button.style.display !== 'none') { // Verifica se o botão está visível
                horarioInput.value = button.textContent;
                document.querySelectorAll("button[type='button']").forEach(btn => {
                    btn.style.backgroundColor = '#007BFF';
                });
                button.style.backgroundColor = '#000000'; // Cor de seleção
            }
        });
    });
});

function verificarHorariosReservados(reservados) {
}
</script>
<?php include "footer.php";
