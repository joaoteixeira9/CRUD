<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
    ?>
    <main class="container mt-5">
    <h2 class="text-center mb-4" style="color: #2c3e50;">Agendamento</h2>
    <?php 
        $id_admin = intval($_GET['id']);
        $sql = "SELECT * FROM clientes";
        $res = mysqli_query($conexao, $sql);
        while ($l = mysqli_fetch_assoc($res)) {

        echo "<form action='./agenda-salvar-2.php?id={$l['id']}' method='post' class='needs-validation' novalidate style='background: #ecf0f1; padding: 20px; border-radius: 8px;'>";
            
            // Seleção de Profissional
            $sql = "SELECT * FROM clientes WHERE id = '$id_admin'";
            $res = mysqli_query($conexao, $sql);
            echo "<div class='mb-3'>";
            echo "<label for='profissional' class='form-label' style='color: #db3026;'>Profissional selecionado:";
            echo "<h2 class='text-uppercase'>";
            while($l = mysqli_fetch_assoc($res)){
            echo "{$l['nome']}";
            echo "</h2></label>";
            }
            echo "</div>";

            // Tabela de Serviços
            echo "<div class='table-responsive mb-4'>";
            echo "<table class='table' style='border-collapse: collapse;'>";
            echo "<thead style='background-color: #34495e; color: white;'>
                <tr>
                    <th>SERVIÇO</th>
                    <th>DESCRIÇÃO</th>
                    <th>PREÇO</th>
                    <th>CATEGORIA</th>
                </tr>
            </thead>";
            $sql = "SELECT * FROM servicos";
            $resultado = mysqli_query($conexao, $sql);
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr style='border-bottom: 1px solid #bdc3c7;'>";
                echo "<td style='padding: 8px; color: #2c3e50;'> {$linha['servico']} </td>";
                echo "<td style='padding: 8px; color: #2c3e50;'> {$linha['descricao']} </td>";
                echo "<td style='padding: 8px; color: #27ae60;'> {$linha['preco']} </td>";
                echo "<td style='padding: 8px; color: #2c3e50;'> {$linha['categoria']} </td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";

            // Seleção de Serviço
            $sql = "SELECT * FROM servicos";
            $res = mysqli_query($conexao, $sql);
            echo "<div class='mb-3'>";
            echo "<label for='servico' class='form-label' style='color: #34495e;'>Selecione um serviço:</label><br>";
            echo "<select name='servico' id='servico' class='form-select' style='background: #fdfefe; border: 1px solid #bdc3c7;'>";
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<option value='{$l['id']}'> {$l['servico']} - R$ {$l['preco']} </option>";
            }
            echo "</select>";
            echo "</div>";
            echo "<br>";
            echo "<p class='text-muted fst-italic mb-3'> 
            Escolha uma data para o serviço.<br> 
            <strong>Lembramos que não trabalhamos aos domingos e segundas-feiras.</strong>
            </p>";
    
            // Campo de Data
            echo "<div class='mb-3'>";
            echo "<label for='dataSelecionada' class='form-label' style='color: #34495e;'>Data:</label>";
            echo "<input type='date' id='dataSelecionada' name='data' class='form-control' style='background: #fdfefe; border: 1px solid #bdc3c7;' required>";
            echo "</div>";
            echo "<p id='alertData'></p>";
            echo "<p class='text-danger' id='alertDataDS'></p>";

            // Geração de Horários e Botões
            function gerarHorarios($inicio, $fim, $intervalo) {
                $horarios = [];
                $inicioTimestamp = strtotime($inicio);
                $fimTimestamp = strtotime($fim);
                while ($inicioTimestamp <= $fimTimestamp) {
                    $horarios[] = date('H:i', $inicioTimestamp);
                    $inicioTimestamp = strtotime("+$intervalo minutes", $inicioTimestamp);
                }
                return $horarios;
            }
            $horariosDisponiveis = gerarHorarios('09:00', '17:00', 30);
            $sql = "SELECT * FROM agenda_2";
            $res = mysqli_query($conexao, $sql);
            $reservados = [];
            while ($l = mysqli_fetch_assoc($res)) {
                $reservados[] = [
                    'data' => $l['data'],
                    'horarioId' => date('H:i', strtotime($l['horarioId']))
                ];
            }
            echo "<script>var horariosReservados = " . json_encode($reservados) . ";</script>";

            echo "<div class='mb-3'>";
            echo "<label class='form-label' style='color: #34495e;'>Selecione um horário:</label>";
            echo "<div style='display: flex; flex-wrap: wrap; gap: 10px;'>";

            foreach ($horariosDisponiveis as $horario) {
                echo "<button type='button' id='horario_{$horario}' class='btn' style='background-color: #3498db; color: white;' onclick=\"selecionarHorario('$horario')\">";
                echo "$horario";
                echo "</button>";
            }
            echo "</div>";
            echo "<p id='erroHorario' class='text-danger' style='display: none;'>Por favor, selecione um horário.</p>";
            echo "</div>";
            echo "<input type='hidden' id='horarioSelecionado' name='horario'>";

            echo "<button type='submit' class='btn mt-4' style='background-color: #2ecc71; color: white;'>Agendar</button>";
            echo "</form> <br><br>";
        }
    ?>
    </main>
    <script src="../js/agendar-alertar.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const erroHorario = document.getElementById('erroHorario');

        form.addEventListener('submit', function (event) {
                const horarioSelecionado = document.getElementById('horarioSelecionado').value;
                if (!horarioSelecionado) {
                    event.preventDefault();
                    erroHorario.style.display = 'block';
                } else {
                    erroHorario.style.display = 'none';
                }
            });
        });
    function selecionarHorario(horarioId) {
        document.getElementById('horarioSelecionado').value = horarioId;
        const botoes = document.querySelectorAll("button[type='button']");
        botoes.forEach(btn => btn.style.backgroundColor = '#db3026');
        const botaoSelecionado = document.getElementById('horario_' + horarioId);
        botaoSelecionado.style.backgroundColor = '#000000';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const dataInput = document.getElementById('dataSelecionada');
        const horarioInput = document.getElementById('horarioSelecionado');
        const horariosReservadosMap = {};

        // Populando o mapa de horários reservados com base na resposta do servidor
        horariosReservados.forEach(reserva => {
            if (!horariosReservadosMap[reserva.data]) {
                horariosReservadosMap[reserva.data] = [];
            }
            horariosReservadosMap[reserva.data].push(reserva.horarioId);
        });

        // Função para verificar e ocultar os horários reservados
        function verificarHorariosReservados() {
            const dataSelecionada = dataInput.value;
            const horariosReservadosDoDia = horariosReservadosMap[dataSelecionada] || [];
            const botoes = document.querySelectorAll("button[type='button']");

            // Exibindo todos os botões de horário
            botoes.forEach(btn => {
                btn.style.display = 'inline-block';
                btn.style.backgroundColor = '#db3026'; // Resetar cor para azul
            });

            // Escondendo os horários reservados para a data selecionada
            horariosReservadosDoDia.forEach(horario => {
                const botao = document.getElementById('horario_' + horario);
                if (botao) {
                    botao.style.display = 'none'; // Esconde o botão do horário reservado
                }
            });
        }

        // Executa a verificação de horários reservados ao carregar a página
        verificarHorariosReservados();

        // Evento para atualizar os horários visíveis quando a data for alterada
        dataInput.addEventListener('change', verificarHorariosReservados);

        // Evento de clique para selecionar o horário
        document.querySelectorAll("button[type='button']").forEach(button => {
            button.addEventListener('click', function () {
                if (button.style.display !== 'none') {
                    horarioInput.value = button.textContent; // Registra o horário selecionado
                    // Destaca o botão selecionado
                    document.querySelectorAll("button[type='button']").forEach(btn => {
                        btn.style.backgroundColor = '#db3026';  // Resetar a cor de fundo
                    });
                    button.style.backgroundColor = '#000000';  // Destacar o botão selecionado
                }
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const dataInput = document.getElementById('dataSelecionada');

        // Função para formatar a data no formato YYYY-MM-DD
        function formatarData(data) {
            const ano = data.getFullYear();
            const mes = String(data.getMonth() + 1).padStart(2, '0');
            const dia = String(data.getDate()).padStart(2, '0');
            return `${ano}-${mes}-${dia}`;
        }

        // Função para verificar se a data é válida (não é domingo ou segunda-feira)
        function dataEhValida(data) {
            const diaDaSemana = data.getDay();
            return diaDaSemana !== 0 && diaDaSemana !== 1; // 0 = Domingo, 1 = Segunda-feira
        }

        // Função para criar uma data sem fuso horário
        function criarDataSemFusoHorario(dataString) {
            const [ano, mes, dia] = dataString.split('-').map(Number);
            return new Date(ano, mes - 1, dia);
        }

        // Função para configurar a data inicial (hoje ou próxima data válida)
        function configurarData() {
            let hoje = new Date();
            dataInput.min = formatarData(hoje); // Define a data mínima como hoje
            dataInput.value = formatarData(hoje); // Define o valor inicial como hoje

            // Verifica se a data inicial é válida
            if (!dataEhValida(hoje)) {
                document.getElementById("alertDataDS").innerHTML = 'A data selecionada é inválida (<strong>não trabalhamos aos domingos e segundas-feiras</strong>). Por favor, escolha outra data!';
                dataInput.value = ''; // Limpa o valor do input
            }
            else{
                document.getElementById("alertDataDS").innerHTML = '';
            }
        }

        // Evento de mudança no input de data
        dataInput.addEventListener('change', function () {
            const dataSelecionada = criarDataSemFusoHorario(this.value);

            // Verifica se a data selecionada é válida
            if (!dataEhValida(dataSelecionada)) {
                document.getElementById("alertDataDS").innerHTML = 'A data selecionada é inválida (<strong>não trabalhamos aos domingos e segundas-feiras</strong>). Por favor, escolha outra data!';
                this.value = ''; // Limpa o valor do input
            }
            else{
                document.getElementById("alertDataDS").innerHTML = '';
            }
        });

        // Configura a data inicial ao carregar a página
        configurarData();
    });
    
    document.addEventListener('DOMContentLoaded', function () {
        const dataInput = document.getElementById('dataSelecionada');
        dataInput.placeholder = "dd/mm/aa";
        dataInput.value = "";

        dataInput.addEventListener('focus', function () {
            this.style.color = "black";
        });

        dataInput.addEventListener('blur', function () {
            if (!this.value) {
                this.style.color = "gray";
            }
        });

        if (!dataInput.value) {
            dataInput.style.color = "gray";
        }
    });
    document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o botão do navbar-toggler
    const navbarToggler = document.querySelector('.navbar-toggler');

    // Verifica se o botão está visível
    if (navbarToggler && window.getComputedStyle(navbarToggler).display !== 'none') {
        // Remove o botão do DOM
        navbarToggler.remove();
    }
    });
    </script>
    <?php include "./footer.php";?>
    <style>
    select.form-select {
        background-color: #ffffff;
        border: 2px solid #bdc3c7;
        color: #0d6efd;
        padding: 10px 15px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    select.form-select:focus {
        outline: none;
        border-color: #0d6efd;
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
    }

    select.form-select:hover {
        border-color: #0a58ca;
    }

    select.form-select option {
        background-color: #ffffff;
        color: #0d6efd;
        padding: 10px;
        font-size: 16px;
    }
    
    @media screen and (max-width: 768px) {
        td {
            font-size: smaller;
            padding: 0.5rem;
            white-space: nowrap;
            overflow: hidden;
        }
        th {
            font-size: smaller;
            white-space: nowrap;
        }
        thead {
            height: 20px;
        }
    }
    </style>