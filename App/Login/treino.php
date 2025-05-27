<?php
session_start();
require 'config.php';

if (!isset($_SESSION['nomeuser'])) {
    header("Location: ./login.html");
    exit();
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $pdo->prepare("DELETE FROM treino WHERE idtreino = ?");
    $stmt->execute([$id]);
    header("Location: treino.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $stmt = $pdo->prepare("UPDATE treino SET nome = ?, descricao = ?, dias = ?, tempo = ?, grupomuscular = ?, dataexecucao = ? WHERE idtreino = ?");
    $stmt->execute([
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['dias'],
        $_POST['tempo'],
        $_POST['grupomuscular'],
        $_POST['dataexecucao'],
        $_POST['update_id']
    ]);
    header("Location: treino.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM treino");
$itens = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Titan Fit - Treino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="../View/Styles.css">
    <link rel="stylesheet" href="../View/CSS/treino.css">
    <style>
    body {
        background-color: #000000;
    }

    h1, h2 {
        text-align: center;
        color: #0CB0F0;
        margin-bottom: 20px;
    }

    label {
        color: #ffffff;
    }

    .table th,
.table td {
    vertical-align: middle;
    text-align: center;
    padding: 15px;
    min-width: 120px; /* Garante largura mínima para todas as colunas */
}

.table th:nth-child(1), /* Nome */
.table td:nth-child(1) {
    min-width: 150px;
}

.table th:nth-child(2), /* Descrição */
.table td:nth-child(2) {
    min-width: 180px;
}

.table th:nth-child(3), /* Dias */
.table td:nth-child(3) {
    min-width: 100px;
}

.table th:nth-child(4), /* Tempo */
.table td:nth-child(4) {
    min-width: 100px;
}

.table th:nth-child(5), /* Grupo Muscular */
.table td:nth-child(5) {
    min-width: 160px;
}

.table th:nth-child(6), /* Data de Execução */
.table td:nth-child(6) {
    min-width: 160px;
}

.table th:nth-child(7), /* Ações */
.table td:nth-child(7) {
    min-width: 160px;
}

    .btn-sm {
        margin: 2px 0;
        padding: 6px 12px;
        font-size: 0.9rem;
    }

    .personalizar-treino {
        width: 100%;
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #000000;
        color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .personalizar-treino input,
    .personalizar-treino select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
    }

    #adicionar-treino {
        background-color: #0CB0F0;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        box-shadow: 0 4px 8px #8C0CF0;
        width: 100%;
    }

    #adicionar-treino:hover {
        background-color: #6200DB;
    }

    @media (max-width: 768px) {
        .table input,
        .table select {
            font-size: 0.85rem;
            padding: 6px;
            max-width: 100%;
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
    }
</style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="../index.php"><img src="../View/Imagens/Logo.png" alt="Logo" height="50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Login/treino.php">Treinos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Planos.php">Planos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../loja.php">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../fale-conosco.php">Fale Conosco</a>
                    </li>
                </ul>
                <span class="navbar-text">Olá, <?= htmlspecialchars($_SESSION['nomeuser']) ?>!</span>
                <a href="logout.php" class="ml-3"><button class="btn btn-danger">Sair</button></a>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <h1 class="text-center mb-4">Treinos Cadastrados</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-dark table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Dias</th>
                        <th>Tempo</th>
                        <th>Grupo Muscular</th>
                        <th>Data de Execução</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens as $item): ?>
                    <tr>
                        <form method="POST">
                            <input type="hidden" name="update_id" value="<?= $item['idtreino'] ?>">
                            <td><input class="form-control" name="nome" value="<?= htmlspecialchars($item['nome']) ?>"></td>
                            <td><input class="form-control" name="descricao" value="<?= htmlspecialchars($item['descricao']) ?>"></td>
                            <td><input class="form-control" name="dias" value="<?= htmlspecialchars($item['dias']) ?>"></td>
                            <td><input class="form-control" name="tempo" value="<?= htmlspecialchars($item['tempo']) ?>"></td>
                            <td>
                                <select name="grupomuscular" class="form-control">
                                    <?php
                                    $grupos = ["Peito", "Costas", "Pernas", "Ombros", "Abdômen"];
                                    foreach ($grupos as $grupo) {
                                        $selected = $item['grupomuscular'] === $grupo ? 'selected' : '';
                                        echo "<option value='$grupo' $selected>$grupo</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type="date" class="form-control" name="dataexecucao" value="<?= $item['dataexecucao'] ?>"></td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm mb-1">Atualizar</button>
                                <a href="?delete=<?= $item['idtreino'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                            </td>
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <hr>

        <h2>Adicionar Novo Exercício</h2>
        <form method="POST" action="..\Controller\processar-treino.php" class="personalizar-treino">
            <label for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" required>

            <label for="descricao">Descrição:</label>
            <input class="form-control" type="text" name="descricao" required>

            <label for="dias">Dias:</label>
            <input class="form-control" type="text" name="dias" required>

            <label for="tempo">Tempo:</label>
            <input class="form-control" type="text" name="tempo" required>

            <label for="grupomuscular">Grupo Muscular:</label>
            <select class="form-control" name="grupomuscular" required>
                <option value="">Selecione</option>
                <option value="Peito">Peito</option>
                <option value="Costas">Costas</option>
                <option value="Pernas">Pernas</option>
                <option value="Ombros">Ombros</option>
                <option value="Abdômen">Abdômen</option>
            </select>

            <label for="dataexecucao">Data de Execução:</label>
            <input class="form-control" type="date" name="dataexecucao" required>

            <button id="adicionar-treino" type="submit">Adicionar</button>
        </form>
    </main>


<footer>
        <p>
            <a href="https://www.facebook.com/?locale=pt_BR" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16">

                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>
            <a href="https://www.instagram.com" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg>
            </a>
            <a href="https://x.com/home?lang=pt" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path
                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                </svg>
            </a>
            <a href="https://www.youtube.com" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-youtube"
                    viewBox="0 0 16 16">
                    <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                </svg>
            </a>
            <a href="https://open.spotify.com/intl-pt?_authfailed=1" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-spotify"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.669 11.538a.5.5 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686m.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858m.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288" />
                </svg>
            </a>
            <a href="https://web.whatsapp.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                </svg>
            </a>
        </p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
