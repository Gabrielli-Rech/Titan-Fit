<?php

class UserModel {
    // Atributos
    private $iduser;
    private $nomeuser;
    private $cpf;
    private $email;
    private $telefone;
    private $dataNascimento;
    private $genero;
    private $endereco;
    private $cidade;
    private $estado;
    private $cep;
    private $info_medica;
    private $senha;


    // Construtor
    public function __construct($iduser, $nomeuser, $cpf, $email, $telefone, $dataNascimento, $genero, $endereco, $cidade, $estado, $cep, $info_medica, $senha) {
        $this->iduser = $iduser;
        $this->nomeuser = $nomeuser;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->genero = $genero;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->info_medica = $info_medica;
        $this->senha = $senha;
    }

    // Getters e Setters
    public function getIduser() {
        return $this->iduser;
    }

    public function getNomeuser() {
        return $this->nomeuser;
    }

    public function setNomeuser($nomeuser) {
        $this->nomeuser = $nomeuser;
        return $this;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
        return $this;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
        return $this;
    }

    public function getInfoMedica() {
        return $this->info_medica;
    }

    public function setInfoMedica($info_medica) {
        $this->info_medica = $info_medica;
        return $this;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    // Métodos para operações com o banco de dados
    public function cadastrarUser() {
        include_once '../DAO/UserDAO.php';
        $dao = new UserDAO();
        $dao->cadastrarUser($this);
    }

    public function alterarUser() {
        include_once '../DAO/UserDAO.php';
        $dao = new UserDAO();
        $dao->alterarUser($this);
    }

    public function excluirUser($iduser) {
        include_once '../DAO/UserDAO.php';
        $dao = new UserDAO();
        $dao->excluirUser($iduser);
    }
}

?>
