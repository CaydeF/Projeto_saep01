<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Status da Tarefa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Editar Status da Tarefa</h1>

    <?php
    // Verifica se o ID da tarefa foi passado como parâmetro GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT SStats FROM Tarefas WHERE Codigo = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $tarefa = $result->fetch_assoc();
        } else {
            echo "Tarefa não encontrada.";
            exit;
        }
    }

    // Verifica se o formulário foi enviado (método POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Atualiza apenas o campo de status
        $sql = "UPDATE Tarefas 
                SET SStats='$status' 
                WHERE Codigo=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Status da tarefa atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar status: " . $conn->error;
        }
    }
    ?>

    <?php if (isset($tarefa)): ?>
        <form action="editar_tarefa.php?id=<?php echo $id; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <label>Status:</label>
            <select name="status" required>
                <option value="A fazer" <?php if($tarefa['SStats'] == 'A fazer') echo 'selected'; ?>>A fazer</option>
                <option value="Em andamento" <?php if($tarefa['SStats'] == 'Em andamento') echo 'selected'; ?>>Em andamento</option>
                <option value="Concluída" <?php if($tarefa['SStats'] == 'Concluída') echo 'selected'; ?>>Concluída</option>
            </select>
            <br><br>
            
            <button type="submit">Salvar Alterações</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
