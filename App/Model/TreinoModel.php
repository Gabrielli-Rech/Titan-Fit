<?php

class TreinoModel {
    // Atributos
    private $idtreino;
    private $nome;
    private $descricao;
    private $dias; // Ex: "Segunda, Quarta, Sexta"
    private $tempo;
    private $grupomuscular;
    private $dataexecucao;

    // Construtor
    public function __construct($idtreino, $nome, $descricao, $dias, $tempo, $grupomuscular, $dataexecucao) {
        $this->idtreino = $idtreino;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dias = $dias;
        $this->tempo = $tempo;
        $this->grupomuscular = $grupomuscular;
        $this->dataexecucao = $dataexecucao;
    }

    // Getters e Setters
    public function getIdtreino() {
        return $this->idtreino;
    }

    public function setIdtreino($idtreino) {
        $this->idtreino = $idtreino;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function getDias() {
        return $this->dias;
    }

    public function setDias($dias) {
        $this->dias = $dias;
        return $this;
    }

    public function getTempo() {
        return $this->tempo;
    }

    public function setTempo($tempo) {
        $this->tempo = $tempo;
        return $this;
    }

    public function getGrupomuscular() {
        return $this->grupomuscular;
    }

    public function setGrupomuscular($grupomuscular) {
        $this->grupomuscular = $grupomuscular;
        return $this;
    }

    public function getDataexecucao() {
        return $this->dataexecucao;
    }

    public function setDataexecucao($dataexecucao) {
        $this->dataexecucao = $dataexecucao;
        return $this;
    }

    // Métodos para operações com o banco de dados
    public function cadastrarTreino() {
        include_once '../DAO/TreinoDAO.php';
        $dao = new TreinoDAO();
        $dao->cadastrarTreino($this);
    }

    public function alterarTreino() {
        include_once '../DAO/TreinoDAO.php';
        $dao = new TreinoDAO();
        $dao->alterarTreino($this);
    }

    public function excluirTreino($idtreino) {
        include_once '../DAO/TreinoDAO.php';
        $dao = new TreinoDAO();
        $dao->excluirTreino($idtreino);
    }
}

?>
