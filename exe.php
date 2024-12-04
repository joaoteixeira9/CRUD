<?php
include 'conexao.php';

// Função para gerar os horários disponíveis para um dia específico
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

// Verificar se a data foi enviada via GET (selecionar a data)
$data = isset($_GET['data']) ? $_GET['data'] : date('Y-m-d');

// Gerar todos os horários possíveis entre 09:00 e 17:00 com intervalos de 30 minutos
$horariosDisponiveis = gerarHorarios('09:00', '17:00', 30);

// Consultar os horários já reservados para a data selecionada
$sql = "SELECT horario FROM reservas WHERE data = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 's', $data);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$reservados = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Converter horários reservados em um array simples para comparação
$horariosReservados = array_map(function ($item) {
    return date('H:i', strtotime($item['horario'])); // Normalizar o formato para comparação
}, $reservados);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se o horário foi enviado
    if (isset($_POST['horario']) && !empty($_POST['horario'])) {
        $horarioReservado = $_POST['horario'];
    
        // Inserir a reserva no banco de dados
        $sql = "INSERT INTO reservas (horario, data, reservado) VALUES (?, ?, 1)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $horarioReservado, $data);
        mysqli_stmt_execute($stmt);

        echo "Reserva feita com sucesso!";
        
        // Atualizar a página para refletir a reserva
        header("Location: ".$_SERVER['PHP_SELF']."?data=".$data);
        exit;
    } else {
        echo "Erro: Nenhum horário foi selecionado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <style>
        .reservado {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <h1>Agendamento de Horários - <?= date('d/m/Y', strtotime($data)) ?></h1>

    <!-- Formulário para escolher uma data -->
    <form method="GET">
        <label for="data">Escolha a data:</label>
        <input type="date" name="data" id="data" value="<?= $data ?>" onchange="this.form.submit()">
    </form>

    <h2>Horários Disponíveis</h2>
    <form method="POST">
        <select name="horario" id="horario">
            <?php foreach ($horariosDisponiveis as $horario): ?>
                <option value="<?= $horario ?>" 
                    <?= in_array($horario, $horariosReservados) ? 'disabled' : '' ?>>
                    <?= $horario ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Reservar</button>
    </form>

    <h2>Horários já reservados para <?= date('d/m/Y', strtotime($data)) ?>:</h2>
    <ul>
        <?php if (count($horariosReservados) > 0): ?>
            <?php foreach ($horariosReservados as $horario): ?>
                <li><?= $horario ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhum horário reservado</li>
        <?php endif; ?>
    </ul>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const horariosReservados = <?= json_encode($horariosReservados); ?>;
            const selectElement = document.getElementById('horario');

            // Desabilitar opções já reservadas
            for (let i = 0; i < selectElement.options.length; i++) {
                const option = selectElement.options[i];
                if (horariosReservados.includes(option.value)) {
                    option.disabled = true;
                    option.classList.add('reservado'); // Adiciona uma classe para estilização
                }
            }
        });
    </script>
</body>
</html>
