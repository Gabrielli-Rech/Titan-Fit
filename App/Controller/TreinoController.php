<?php
require_once '../Model/TreinoModel.php';
require_once '../DAO/TreinoDAO.php';

class TreinoController {

    private $treinoDAO;

    public function __construct() {
        $this->treinoDAO = new TreinoDAO();
    }

    public function cadastrarTreino($dados) {
        $treino = new TreinoModel(
            null, // ID é auto-incremento
            $dados['nome'],
            $dados['descricao'],
            $dados['dias'],
            $dados['tempo'],
            $dados['grupo_muscular'],
            $dados['dataexecucao']
        );

        return $this->treinoDAO->cadastrarTreino($treino);
    }

    public function atualizarTreino($dados) {
        $treino = new TreinoModel(
            $dados['idtreino'],
            $dados['nome'],
            $dados['descricao'],
            $dados['dias'],
            $dados['tempo'],
            $dados['grupo_muscular'],
            $dados['dataexecucao']
        );

        return $this->treinoDAO->atualizarTreino($treino);
    }

    public function excluirTreino($idtreino) {
        return $this->treinoDAO->excluirTreino($idtreino);
    }

    public function listarTodos() {
        return $this->treinoDAO->listarTodos();
    }

    public function buscarPorId($idtreino) {
        return $this->treinoDAO->buscarPorId($idtreino);
    }
}
?>
