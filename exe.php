<?php
// Arquivo de armazenamento das reservas (usando JSON)
$reservasArquivo = 'reservas.json';

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

// Carregar reservas do arquivo JSON (se existir)
function carregarReservas() {
    global $reservasArquivo;
    if (file_exists($reservasArquivo)) {
        $reservasJson = file_get_contents($reservasArquivo);
        return json_decode($reservasJson, true);
    }
    return [];
}

// Salvar reservas no arquivo JSON
function salvarReservas($reservas) {
    global $reservasArquivo;
    file_put_contents($reservasArquivo, json_encode($reservas, JSON_PRETTY_PRINT));
}

// Lista de barbeiros
$funcionarios = [
    1 => 'João',
    2 => 'Carlos',
    3 => 'Pedro',
];

// Verificar se a data e o barbeiro foram enviados via GET
$data = isset($_GET['data']) ? $_GET['data'] : date('Y-m-d');
$funcionarioId = isset($_GET['funcionario_id']) ? (int)$_GET['funcionario_id'] : 1; // Padrão: primeiro funcionário

// Gerar todos os horários possíveis entre 09:00 e 17:00 com intervalos de 30 minutos
$horariosDisponiveis = gerarHorarios('09:00', '17:00', 30);

// Carregar as reservas do arquivo JSON
$reservas = carregarReservas();

// Consultar os horários já reservados para o barbeiro na data selecionada
$reservados = [];
foreach ($reservas as $reserva) {
    if ($reserva['data'] == $data && $reserva['funcionario_id'] == $funcionarioId) {
        $reservados[] = $reserva['horario'];
    }
}

// Se o formulário foi enviado, realizar a reserva
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['horario'], $_POST['funcionario_id']) && !empty($_POST['horario'])) {
        $horarioReservado = $_POST['horario'];
        $funcionarioId = (int)$_POST['funcionario_id'];
    
        // Adicionar a nova reserva
        $reservas[] = [
            'horario' => $horarioReservado,
            'data' => $data,
            'funcionario_id' => $funcionarioId,
        ];

        // Salvar as reservas no arquivo
        salvarReservas($reservas);

        echo "Reserva feita com sucesso!";
        
        // Atualizar a página para refletir a reserva
        header("Location: ".$_SERVER['PHP_SELF']."?data=".$data."&funcionario_id=".$funcionarioId);
        exit;
    } else {
        echo "Erro: Nenhum horário ou barbeiro foi selecionado.";
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

    <!-- Formulário para escolher um barbeiro e uma data -->
    <form method="GET">
        <label for="funcionario_id">Escolha o barbeiro:</label>
        <select name="funcionario_id" id="funcionario_id" onchange="this.form.submit()">
            <?php foreach ($funcionarios as $id => $nome): ?>
                <option value="<?= $id ?>" 
                    <?= $funcionarioId == $id ? 'selected' : '' ?>>
                    <?= $nome ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="data">Escolha a data:</label>
        <input type="date" name="data" id="data" value="<?= $data ?>" onchange="this.form.submit()">
    </form>

    <h2>Horários Disponíveis</h2>
    <form method="POST">
        <input type="hidden" name="funcionario_id" value="<?= $funcionarioId ?>">
        <select name="horario" id="horario">
            <?php foreach ($horariosDisponiveis as $horario): ?>
                <option value="<?= $horario ?>" 
                    <?= in_array($horario, $reservados) ? 'disabled' : '' ?>>
                    <?= $horario ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Reservar</button>
    </form>

    <h2>Horários já reservados para <?= date('d/m/Y', strtotime($data)) ?> pelo barbeiro:</h2>
    <ul>
        <?php if (count($reservados) > 0): ?>
            <?php foreach ($reservados as $horario): ?>
                <li><?= $horario ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhum horário reservado</li>
        <?php endif; ?>
    </ul>
</body>
</html>
