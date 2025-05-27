<?php
require_once '../Model/UserModel.php';
require_once '../DAO/UserDAO.php';

class UserController {

    private $userDAO;

    public function __construct() {
        $this->userDAO = new UserDAO();
    }

    public function cadastraruser($dados) {
        $user = new UserModel(
            null,
            $dados['nomeuser'],
            $dados['cpf'],
            $dados['email'],
            $dados['telefone'],
            $dados['dataNascimento'],
            $dados['genero'],
            $dados['endereco'],
            $dados['cidade'],
            $dados['estado'],
            $dados['cep'],
            $dados['info_medica'],
            $dados['senha']
        );
    
        return $this->userDAO->cadastrarUser($user);
    }
    

    public function atualizar($dados) {
        $user = new UserModel(
            $dados['iduser'],
            $dados['nomeuser'],
            $dados['cpf'],
            $dados['email'],
            $dados['telefone'],
            $dados['dataNascimento'],
            $dados['genero'],
            $dados['endereco'],
            $dados['cidade'],
            $dados['estado'],
            $dados['cep'],
            $dados['info_medica'],
            $dados['senha']
        );
    
        return $this->userDAO->alterarUser($user);
    }
    

    public function excluir($iduser) {
        return $this->userDAO->excluirUser($iduser);
    }

    public function listarTodos() {
        return $this->userDAO->buscarTodos();
    }

    public function buscarPorCPF($cpf) {
        return $this->userDAO->buscarPorCPF($cpf);
    }
}
?>
