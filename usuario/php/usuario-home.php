<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
?>
<main>
    <?php
        session_start(); // Inicia a sessão
        $nome = $_SESSION['nome'];
        $id = $_SESSION['id'];
        echo "<br>
        <div class='alert text-center' role='alert'>
            <h2 class='display-4 text-capitalize'>Olá, " .($nome) . "!</h2>
            <p class='lead'>Bem-vindo(a) ao nosso sistema.</p>
        </div>";

        // Array para armazenar os agendamentos do usuário
        $agendamentosUsuario = [];

        // Consulta para obter todas as tabelas do banco de dados que começam com 'agenda_'
        $sqlTabelas = "SHOW TABLES LIKE 'agenda_%'";
        $resTabelas = mysqli_query($conexao, $sqlTabelas);

        if ($resTabelas) {
            // Armazena os nomes das tabelas em um array
            $tabelasAgendamento = [];
            while ($row = mysqli_fetch_row($resTabelas)) {
                $tabelasAgendamento[] = $row[0]; // Adiciona o nome da tabela ao array
            }

            // Loop para buscar agendamentos de cada tabela
            foreach ($tabelasAgendamento as $tabela) {
                // Consulta para buscar agendamentos do usuário logado com o nome do profissional
                $sqlAgendamentos = "
                    SELECT a.*, p.nome AS nome_profissional 
                    FROM $tabela a
                    INNER JOIN clientes p ON a.profissionalId = p.id
                    WHERE a.clienteId = $id;
                ";
                $resAgendamentos = mysqli_query($conexao, $sqlAgendamentos);

                if ($resAgendamentos) {
                    // Adiciona os agendamentos ao array geral
                    $agendamentosUsuario = array_merge($agendamentosUsuario, mysqli_fetch_all($resAgendamentos, MYSQLI_ASSOC));
                } else {
                    echo "Erro ao executar a consulta na tabela $tabela: " . mysqli_error($conexao);
                }
            }
        } else {
            echo "Erro ao listar tabelas: " . mysqli_error($conexao);
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header text-white " style="background-color: #db3026;">
                        <h5 class="card-title mb-0">Meus Agendamentos</h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($agendamentosUsuario)): ?>
                            <ul class="list-group">
                                <?php foreach ($agendamentosUsuario as $agendamento): ?>
                                    <li class="list-group-item">
                                        <?php 
                                        // Formata a data para dd/mm/aaaa
                                        $dataFormatada = date('d/m/Y', strtotime($agendamento['data']));

                                        // Exibe o nome do profissional, data formatada e hora
                                        echo "<strong>Profissional:</strong> " . $agendamento['nome_profissional'] . " - <strong>Data:</strong> " . $dataFormatada . " - <strong>Hora:</strong> " . $agendamento['horarioId'];
                                        ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">Nenhum agendamento encontrado.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <h5 class="alert-heading">Precisa desmarcar um horário?</h5>
                    <p>
                        Caso precise desmarcar um horário, entre em contato diretamente com o barbeiro responsável pelo agendamento.
                    </p>
                    <hr>
                    <p class="mb-0">
                        <strong>Passo a passo:</strong>
                        <ol>
                            <li>Clique no cabeçalho <strong>"Funcionários"</strong> no menu superior.</li>
                            <li>Localize o barbeiro responsável pelo seu agendamento.</li>
                            <li>Anote o número de telefone do barbeiro.</li>
                            <li>Entre em contato para desmarcar ou reagendar o horário.</li>
                        </ol>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include "./footer.php";
?>