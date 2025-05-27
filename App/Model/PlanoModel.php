<?php

class PlanoModel {
    private $idplano;
    private $nome;
    private $valor;
    private $descricao;
    private $duracao;
    private $beneficios;
    private $status;

    // Métodos de acesso (Getters)
    public function getIdPlano() {
        return $this->idplano;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDuracao() {
        return $this->duracao;
    }

    public function getBeneficios() {
        return $this->beneficios;
    }

    public function getStatus() {
        return $this->status;
    }

    // Métodos de modificação (Setters)
    public function setIdPlano($idplano) {
        $this->idplano = $idplano;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    public function setBeneficios($beneficios) {
        $this->beneficios = $beneficios;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Construtor
    public function __construct($nome = '', $valor = 0, $descricao = '', $duracao = '', $beneficios = '', $status = '') {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->duracao = $duracao;
        $this->beneficios = $beneficios;
        $this->status = $status;
    }
}

?>
