<?php
include 'db.php';

// Buscar produtos do banco de dados
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Barbearia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }
        .product {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            margin: 15px;
            padding: 20px;
            text-align: center;
        }
        .product img {
            width: 100%;
            border-radius: 8px;
            max-height: 200px;
            object-fit: cover;
        }
        .product h3 {
            margin-top: 15px;
            font-size: 1.2em;
            color: #333;
        }
        .product p {
            color: #777;
            font-size: 0.9em;
        }
        .product .price {
            margin-top: 10px;
            font-size: 1.4em;
            color: #5CB85C;
        }
    </style>
</head>
<body>
    <header>
        <h1>Produtos para Barbearia</h1>
    </header>
    
    <div class="product-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <img src="images/<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>">
                    <h3><?php echo $row['nome']; ?></h3>
                    <p><?php echo $row['descricao']; ?></p>
                    <p class="price">R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
