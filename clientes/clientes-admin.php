<?php 
    include "../includes/header.php" ;
    include "../includes/conexao.php";

    $id = $_GET["id"];

    $sql = "UPDATE clientes SET tipoDeUsuario = 'admin' WHERE id = '$id'"; 
    $resultado = mysqli_query($conexao, $sql);

    $sql_tabela = "CREATE TABLE agenda_" . intval($id) . " (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `clienteId` INT(11) NOT NULL,
        `profissionalId` INT(11) NOT NULL,
        `servicoId` INT(11) NOT NULL,
        `data` DATE NOT NULL,
        `horarioId` VARCHAR(100) NOT NULL,
        PRIMARY KEY (`id`)
    );";
    $resultado = mysqli_query($conexao, $sql_tabela);

    $id_admin = intval($id);

    $agendaPhp = '<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
    ?>
    <main class="container mt-5">
    <h2 class="text-center mb-4" style="color: #2c3e50;">Agendamento</h2>
    <?php 
        $id_admin = intval($_GET[\'id\']);
        $sql = "SELECT * FROM clientes";
        $res = mysqli_query($conexao, $sql);
        while ($l = mysqli_fetch_assoc($res)) {

        echo "<form action=\'./agenda-salvar-'. $id .'.php?id={$l[\'id\']}\' method=\'post\' class=\'needs-validation\' novalidate style=\'background: #ecf0f1; padding: 20px; border-radius: 8px;\'>";
            
            // Seleção de Profissional
            $sql = "SELECT * FROM clientes WHERE id = \'$id_admin\'";
            $res = mysqli_query($conexao, $sql);
            echo "<div class=\'mb-3\'>";
            echo "<label for=\'profissional\' class=\'form-label\' style=\'color: #db3026;\'>Profissional selecionado:";
            echo "<h2 class=\'text-uppercase\'>";
            while($l = mysqli_fetch_assoc($res)){
            echo "{$l[\'nome\']}";
            echo "</h2></label>";
            }
            echo "</div>";

            // Tabela de Serviços
            echo "<div class=\'table-responsive mb-4\'>";
            echo "<table class=\'table\' style=\'border-collapse: collapse;\'>";
            echo "<thead style=\'background-color: #34495e; color: white;\'>
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
                echo "<tr style=\'border-bottom: 1px solid #bdc3c7;\'>";
                echo "<td style=\'padding: 8px; color: #2c3e50;\'> {$linha[\'servico\']} </td>";
                echo "<td style=\'padding: 8px; color: #2c3e50;\'> {$linha[\'descricao\']} </td>";
                echo "<td style=\'padding: 8px; color: #27ae60;\'> {$linha[\'preco\']} </td>";
                echo "<td style=\'padding: 8px; color: #2c3e50;\'> {$linha[\'categoria\']} </td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";

            // Seleção de Serviço
            $sql = "SELECT * FROM servicos";
            $res = mysqli_query($conexao, $sql);
            echo "<div class=\'mb-3\'>";
            echo "<label for=\'servico\' class=\'form-label\' style=\'color: #34495e;\'>Selecione um serviço:</label><br>";
            echo "<select name=\'servico\' id=\'servico\' class=\'form-select\' style=\'background: #fdfefe; border: 1px solid #bdc3c7;\'>";
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<option value=\'{$l[\'id\']}\'> {$l[\'servico\']} - R$ {$l[\'preco\']} </option>";
            }
            echo "</select>";
            echo "</div>";
            echo "<br>";
            echo "<p class=\'text-muted fst-italic mb-3\'> 
            Escolha uma data para o serviço.<br> 
            <strong>Lembramos que não trabalhamos aos domingos e segundas-feiras.</strong>
            </p>";
    
            // Campo de Data
            echo "<div class=\'mb-3\'>";
            echo "<label for=\'dataSelecionada\' class=\'form-label\' style=\'color: #34495e;\'>Data:</label>";
            echo "<input type=\'date\' id=\'dataSelecionada\' name=\'data\' class=\'form-control\' style=\'background: #fdfefe; border: 1px solid #bdc3c7;\' required>";
            echo "</div>";
            echo "<p id=\'alertData\'></p>";
            echo "<p class=\'text-danger\' id=\'alertDataDS\'></p>";

            // Geração de Horários e Botões
            function gerarHorarios($inicio, $fim, $intervalo) {
                $horarios = [];
                $inicioTimestamp = strtotime($inicio);
                $fimTimestamp = strtotime($fim);
                while ($inicioTimestamp <= $fimTimestamp) {
                    $horarios[] = date(\'H:i\', $inicioTimestamp);
                    $inicioTimestamp = strtotime("+$intervalo minutes", $inicioTimestamp);
                }
                return $horarios;
            }
            $horariosDisponiveis = gerarHorarios(\'09:00\', \'17:00\', 30);
            $sql = "SELECT * FROM agenda_'.$id.'";
            $res = mysqli_query($conexao, $sql);
            $reservados = [];
            while ($l = mysqli_fetch_assoc($res)) {
                $reservados[] = [
                    \'data\' => $l[\'data\'],
                    \'horarioId\' => date(\'H:i\', strtotime($l[\'horarioId\']))
                ];
            }
            echo "<script>var horariosReservados = " . json_encode($reservados) . ";</script>";

            echo "<div class=\'mb-3\'>";
            echo "<label class=\'form-label\' style=\'color: #34495e;\'>Selecione um horário:</label>";
            echo "<div style=\'display: flex; flex-wrap: wrap; gap: 10px;\'>";

            foreach ($horariosDisponiveis as $horario) {
                echo "<button type=\'button\' id=\'horario_{$horario}\' class=\'btn\' style=\'background-color: #3498db; color: white;\' onclick=\"selecionarHorario(\'$horario\')\">";
                echo "$horario";
                echo "</button>";
            }
            echo "</div>";
            echo "<p id=\'erroHorario\' class=\'text-danger\' style=\'display: none;\'>Por favor, selecione um horário.</p>";
            echo "</div>";
            echo "<input type=\'hidden\' id=\'horarioSelecionado\' name=\'horario\'>";

            echo "<button type=\'submit\' class=\'btn mt-4\' style=\'background-color: #2ecc71; color: white;\'>Agendar</button>";
            echo "</form> <br><br>";
        }
    ?>
    </main>
    <script src="../js/agendar-alertar.js"></script>
    <script>
    document.addEventListener(\'DOMContentLoaded\', function () {
        const form = document.querySelector(\'form\');
        const erroHorario = document.getElementById(\'erroHorario\');

        form.addEventListener(\'submit\', function (event) {
                const horarioSelecionado = document.getElementById(\'horarioSelecionado\').value;
                if (!horarioSelecionado) {
                    event.preventDefault();
                    erroHorario.style.display = \'block\';
                } else {
                    erroHorario.style.display = \'none\';
                }
            });
        });
    function selecionarHorario(horarioId) {
        document.getElementById(\'horarioSelecionado\').value = horarioId;
        const botoes = document.querySelectorAll("button[type=\'button\']");
        botoes.forEach(btn => btn.style.backgroundColor = \'#db3026\');
        const botaoSelecionado = document.getElementById(\'horario_\' + horarioId);
        botaoSelecionado.style.backgroundColor = \'#000000\';
    }

    document.addEventListener(\'DOMContentLoaded\', function () {
        const dataInput = document.getElementById(\'dataSelecionada\');
        const horarioInput = document.getElementById(\'horarioSelecionado\');
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
            const botoes = document.querySelectorAll("button[type=\'button\']");

            // Exibindo todos os botões de horário
            botoes.forEach(btn => {
                btn.style.display = \'inline-block\';
                btn.style.backgroundColor = \'#db3026\'; // Resetar cor para azul
            });

            // Escondendo os horários reservados para a data selecionada
            horariosReservadosDoDia.forEach(horario => {
                const botao = document.getElementById(\'horario_\' + horario);
                if (botao) {
                    botao.style.display = \'none\'; // Esconde o botão do horário reservado
                }
            });
        }

        // Executa a verificação de horários reservados ao carregar a página
        verificarHorariosReservados();

        // Evento para atualizar os horários visíveis quando a data for alterada
        dataInput.addEventListener(\'change\', verificarHorariosReservados);

        // Evento de clique para selecionar o horário
        document.querySelectorAll("button[type=\'button\']").forEach(button => {
            button.addEventListener(\'click\', function () {
                if (button.style.display !== \'none\') {
                    horarioInput.value = button.textContent; // Registra o horário selecionado
                    // Destaca o botão selecionado
                    document.querySelectorAll("button[type=\'button\']").forEach(btn => {
                        btn.style.backgroundColor = \'#db3026\';  // Resetar a cor de fundo
                    });
                    button.style.backgroundColor = \'#000000\';  // Destacar o botão selecionado
                }
            });
        });
    });


    document.addEventListener(\'DOMContentLoaded\', function () {
        const dataInput = document.getElementById(\'dataSelecionada\');

        // Função para formatar a data no formato YYYY-MM-DD
        function formatarData(data) {
            const ano = data.getFullYear();
            const mes = String(data.getMonth() + 1).padStart(2, \'0\');
            const dia = String(data.getDate()).padStart(2, \'0\');
            return `${ano}-${mes}-${dia}`;
        }

        // Função para verificar se a data é válida (não é domingo ou segunda-feira)
        function dataEhValida(data) {
            const diaDaSemana = data.getDay();
            return diaDaSemana !== 0 && diaDaSemana !== 1; // 0 = Domingo, 1 = Segunda-feira
        }

        // Função para criar uma data sem fuso horário
        function criarDataSemFusoHorario(dataString) {
            const [ano, mes, dia] = dataString.split(\'-\').map(Number);
            return new Date(ano, mes - 1, dia);
        }

        // Função para configurar a data inicial (hoje ou próxima data válida)
        function configurarData() {
            let hoje = new Date();
            hoje.setDate(hoje.getDate() + 1);
            dataInput.min = formatarData(hoje); // Define a data mínima como hoje
            dataInput.value = formatarData(hoje); // Define o valor inicial como hoje

            // Verifica se a data inicial é válida
            if (!dataEhValida(hoje)) {
                document.getElementById("alertDataDS").innerHTML = \'A data selecionada é inválida (<strong>não trabalhamos aos domingos e segundas-feiras</strong>). Por favor, escolha outra data!\';
                dataInput.value = \'\'; // Limpa o valor do input
            }
            else{
                document.getElementById("alertDataDS").innerHTML = \'\';
            }
        }

        // Evento de mudança no input de data
        dataInput.addEventListener(\'change\', function () {
            const dataSelecionada = criarDataSemFusoHorario(this.value);

            // Verifica se a data selecionada é válida
            if (!dataEhValida(dataSelecionada)) {
                document.getElementById("alertDataDS").innerHTML = \'A data selecionada é inválida (<strong>não trabalhamos aos domingos e segundas-feiras</strong>). Por favor, escolha outra data!\';
                this.value = \'\'; // Limpa o valor do input
            }
            else{
                document.getElementById("alertDataDS").innerHTML = \'\';
            }
        });

        // Configura a data inicial ao carregar a página
        configurarData();
    });
    
    document.addEventListener(\'DOMContentLoaded\', function () {
        const dataInput = document.getElementById(\'dataSelecionada\');
        dataInput.placeholder = "dd/mm/aa";
        dataInput.value = "";

        dataInput.addEventListener(\'focus\', function () {
            this.style.color = "black";
        });

        dataInput.addEventListener(\'blur\', function () {
            if (!this.value) {
                this.style.color = "gray";
            }
        });

        if (!dataInput.value) {
            dataInput.style.color = "gray";
        }
    });
    document.addEventListener(\'DOMContentLoaded\', function () {
    // Seleciona o botão do navbar-toggler
    const navbarToggler = document.querySelector(\'.navbar-toggler\');

    // Verifica se o botão está visível
    if (navbarToggler && window.getComputedStyle(navbarToggler).display !== \'none\') {
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
    </style>';

    file_put_contents("../usuario/php/agenda-agendar-$id.php", $agendaPhp);

    $agendaSalvarPhp = '<?php
    include "../../includes/conexao.php";
    session_start();
    $clienteId = $_SESSION[\'id\'];
    $profissionalId = '. $id_admin .';
    $servicoId = $_POST["servico"];
    $data = $_POST["data"];
    $horarioId = $_POST["horario"];
    $sql = "INSERT INTO agenda_'. $id_admin .' (clienteId, profissionalId, servicoId, data, horarioId) VALUES ($clienteId,\'$profissionalId\', $servicoId, \'$data\' , \'$horarioId\')";
    $res = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    header("Location: ./usuario-home.php");
    ?>';
    file_put_contents("../usuario/php/agenda-salvar-$id.php", $agendaSalvarPhp);

    $agendaListarPhp = '<link rel="stylesheet" href="../css/agenda-listar.css">
        <?php 
        include "../includes/header.php"; 
        include "../includes/conexao.php";
        echo "<br>";

        $dataFiltro = $_GET[\'dataFiltro\'] ?? "";
        if($dataFiltro != ""){
            $dataFiltro = "where data = \'$dataFiltro\'";
        }

        // Consulta a tabela agenda
        $data = date(\'Y-m-d\');
        $sql = "SELECT * FROM agenda_'. $id_admin .' " . $dataFiltro;
        $res = mysqli_query($conexao, $sql);

        $sqlData = "SELECT distinct data FROM agenda_'. $id_admin .'";
        $resData = mysqli_query($conexao, $sqlData);
        echo "<div class=\'container text-center my-4\'>";
        echo "<h2 class=\'display-4\'>Visualize sua agenda</h2>";
        echo "</div>";

        echo "<div class=\'d-flex flex-wrap me-2 mb-4 justify-content-center align-items-center\'>";
        while ($linha = mysqli_fetch_assoc($resData)) {
            echo " <a href=\'agenda-listar-'.$id_admin.'.php?dataFiltro=".$linha[\'data\']."\'><button class=\'btn\'>" . date(\'d/m/Y\', strtotime($linha[\'data\'])) . "</button></a> " ;
        }
        echo "</div>";
        // Início da tabela
        echo "<div class=\'tabelaAgenda\' style=\'width: 70%; display: flex; justify-content: center;  margin: 0 auto;\'>";
        echo "<div class=\'table-responsive\'>";
        echo "<table class=\'table\'>";
        echo "<thead style=\'background-color: #34495e; color: white;\'>
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
            $clienteId = $linha[\'clienteId\'];
            $sqlCliente = "SELECT nome FROM clientes WHERE id = $clienteId";
            $resCliente = mysqli_query($conexao, $sqlCliente);
            $linhaCliente = mysqli_fetch_assoc($resCliente);
            $nomeCliente = $linhaCliente[\'nome\'];

            // Buscar o nome do profissional
            $profissionalId = $linha[\'profissionalId\']; 
            $sqlProfissional = "SELECT nome FROM clientes WHERE id = $profissionalId";
            $resProfissional = mysqli_query($conexao, $sqlProfissional);
            $linhaProfissional = mysqli_fetch_assoc($resProfissional);
            $nomeProfissional = $linhaProfissional[\'nome\'];

            // Buscar o serviço e o preço
            $servicoId = $linha[\'servicoId\']; 
            $sqlServico = "SELECT servico, preco FROM servicos WHERE id = $servicoId";
            $resServico = mysqli_query($conexao, $sqlServico);
            $linhaServico = mysqli_fetch_assoc($resServico);
            $servico = $linhaServico[\'servico\'];
            $preco = $linhaServico[\'preco\'];

            // Exibir a linha da tabela com os dados
            echo "<tr>
                <td>$nomeCliente</td>
                <td>$nomeProfissional</td>
                <td>$servico</td>
                <td>" . date(\'d/m/Y\', strtotime($linha[\'data\'])) . "</td>
                <td>{$linha[\'horarioId\']}</td>
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
        <?php include "../includes/footer.php"; ?>';
    file_put_contents("../agenda/agenda-listar-$id.php", $agendaListarPhp);

    mysqli_close($conexao);
    header("Location: ./clientes-listar.php");

    include "../includes/footer.php"
?>