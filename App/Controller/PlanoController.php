<?php
require_once '../Model/PlanoModel.php';
require_once '../DAO/PlanoDAO.php';

class PlanoController {
    public function cadastrarPlano($nome, $valor, $descricao, $duracao, $beneficios, $status) {
        $plano = new PlanoModel();
        $plano->setNome($nome);
        $plano->setValor($valor);
        $plano->setDescricao($descricao);
        $plano->setDuracao($duracao);
        $plano->setBeneficios($beneficios);
        $plano->setStatus($status);

        $dao = new PlanoDAO();
        return $dao->cadastrarPlano($plano);
    }

    public function listarPlanos() {
        $dao = new PlanoDAO();
        return $dao->buscarTodos();
    }
}
?>
