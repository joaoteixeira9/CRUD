<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_FILES['imagem']['name'];

    // Salvar imagem na pasta 'images'
    $target_dir = "images/";
    $target_file = $target_dir . basename($imagem);
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);

    // Inserir dados no banco de dados
    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nome', '$descricao', '$preco', '$imagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo produto adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #5CB85C;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Adicionar Produto</h2>
        <form action="adicionar_produto.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <textarea name="descricao" placeholder="Descrição do Produto" required></textarea>
            <input type="number" name="preco" placeholder="Preço do Produto" required>
            <input type="file" name="imagem" required>
            <button type="submit">Adicionar Produto</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
