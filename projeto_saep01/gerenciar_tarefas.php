<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Tarefas</title>
</head>
<body>

<div class="container">
    <h1>Gerenciar Tarefas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Usuário ID</th>
            <th>Setor</th>
            <th>Prioridade</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php
        $sql = "SELECT * FROM Tarefas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["Codigo"]."</td>
                        <td>".$row["Setor"]."</td>
                        <td>".$row["Prioridade"]."</td>
                        <td>".$row["Descricao"]."</td>
                        <td>".$row["SStats"]."</td>
                        <td>
                            <a href='editar_tarefa.php?id=".$row["Codigo"]."'>Editar</a> | 
                            <a href='excluir_tarefa.php?id=".$row["Codigo"]."' onclick='return confirm(\"Tem certeza que deseja excluir esta tarefa?\")'>Excluir</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nenhuma tarefa encontrada</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
