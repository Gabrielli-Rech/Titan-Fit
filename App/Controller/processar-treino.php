<?php
require_once '../Controller/TreinoController.php';

$controller = new TreinoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome'          => $_POST['nome'] ?? '',
        'descricao'     => $_POST['descricao'] ?? '',
        'dias'          => $_POST['dias'] ?? '',
        'tempo'         => $_POST['tempo'] ?? '',
        'grupo_muscular'=> $_POST['grupo_muscular'] ?? '',
        'dataexecucao'  => $_POST['dataexecucao'] ?? '',
    ];

    $resultado = $controller->cadastrarTreino($dados);

    if (is_array($resultado) && isset($resultado['erro'])) {
        echo "Erro: " . $resultado['erro'];
    } else {
        echo "Treino cadastrado com sucesso!";
    }
}
?>
