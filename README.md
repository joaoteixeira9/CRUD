# Documentação do Site da Barbearia
 
## Introdução
 
Este documento descreve o funcionamento e a estrutura do site da barbearia, permitindo que clientes agendem horários para corte de cabelo e interajam com a barbearia via WhatsApp. O site foi desenvolvido utilizando HTML, CSS, JavaScript, C#, PHP e banco de dados.
 
## Tecnologias Utilizadas
 
- **Front-end:** HTML, CSS, JavaScript
- **Back-end:** C#, PHP
- **Banco de Dados:** MySQL
- **Frameworks/Libraries:** Bootstrap
 
## Funcionalidades
 
1. **Página Inicial**
   - Apresentação da barbearia
   - Imagens do ambiente e serviços
   - Fotos/Videos dos três colaboradores
   - Botoes interativos
   
 
2. **Agendamento de Horários**
  - Login de usuario
-   Formulário para inserção de nome, telefone, data e horário desejado
   - Botão para agendamento de horário
   - Validação dos campos antes do envio
   - Armazenamento das informações no banco de dados
   - Confirmação do agendamento via WhatsApp
 
1. **Lista de Serviços**
   - Exibição dos serviços oferecidos
   - Preços e duração média de cada serviço
 
2. **Contato e Localização**
   - Mapa interativo com a localização da barbearia
   - Links para redes sociais
   - Botão para contato direto via WhatsApp
 
## Instalação e Configuração
 
### Pré-requisitos
 
Antes de rodar o projeto, certifique-se de ter:
- Servidor Apache ou XAMPP
- MySQL instalado
- PHP configurado
 
### Passos para Instalação
 
1. Clone o repositório:
   ```sh
   git clone https://github.com/joaoteixeira9/CRUD.git
2. Acesse o diretório do projeto:
   ```sh
   cd site-barbearia
   ```
3. Importe o banco de dados `bd_barbearia` no MySQL.
4. Configure as credenciais do banco de dados no arquivo `config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'seu_usuario');
   define('DB_PASS', 'sua_senha');
   define('DB_NAME', 'bd_barbearia');
   ```
5. Inicie o servidor local e acesse o site via navegador.
 
## Estrutura de Arquivos
 
```
/Crud
│── agenda/           # Gerenciamento de agendamentos
│── clientes/         # Seção de clientes
│── css/              # Estilos do site
│── fornecedores/     # Informações sobre fornecedores
│── funcionarios/     # Dados de funcionários
│── img/              # Imagens
│── includes/         # Arquivos reutilizáveis
│── js/               # Scripts JavaScript
│── php/              # Scripts PHP
│── produtos/         # Seção de produtos
│── servicos/         # Lista de serviços
│── usuario/          # Gerenciamento de usuários
│── bd_barbearia.sql  # Script do banco de dados
```
## Banco de Dados
 
### Estrutura da Tabela `agendamentos`
 
```sql
BANCO DE DADOS
 
CREATE TABLE `clientes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(100) NOT NULL,
 `telefone` varchar(20) NOT NULL,
 `email` varchar(200) NOT NULL,
 `senha` varchar(30) NOT NULL,
 `tipoDeUsuario` varchar(100) NOT NULL DEFAULT 'usuario',
 PRIMARY KEY (`id`)
)
 
CREATE TABLE `funcionarios` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(100) NOT NULL,
 `telefone` varchar(20) NOT NULL,
 PRIMARY KEY (`id`)
)
 
CREATE TABLE `horarios` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `horario` varchar(100) NOT NULL,
 `reservado` tinyint(1) DEFAULT NULL,
 `data` date DEFAULT NULL,
 PRIMARY KEY (`id`)
)
 
CREATE TABLE `servicos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `servico` varchar(100) NOT NULL,
 `descricao` varchar(1000) NOT NULL,
 `preco` varchar(100) NOT NULL,
 `categoria` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
)
```
 
## Melhorias Futuras
 
- Implementação de login para administradores
- Integração com pagamentos online
- Histórico de agendamentos para clientes
## Colaboradores
<table>
  <tr>
    <td align="center">
      <a href="https://github.com/Lucaseduardo583" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/146371860?v=4" width="150px;" alt="Foto do Lucas"/><br>
        <sub>
          <b>Lucas Eduardo</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/joaoteixeira9" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/143551272?v=4" width="150px;" alt="Foto do João"/><br>
        <sub>
          <b>João Teixeira</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/ClaudineiClemente48" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/146371914?v=4" width="150px;" alt="Foto do Claudinei"/><br>
        <sub>
          <b>Claudinei Clemente</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/DaniloBandeira0" title="defina o título do link">
        <img src="https://avatars.githubusercontent.com/u/143565487?v=4" width="150px;" alt="Foto do Danilo"/><br>
        <sub>
          <b>Danilo Bandeira</b>
        </sub>
      </a>
    </td>
  </tr>
</table>
 
