<?php
require_once 'Conexao.php';
require_once '../Model/PlanoModel.php';

class PlanoDAO {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();  // Instancia a classe Conexao
        $this->conn = $conexao->fazConexao();  // Chama o método de conexão
    }

    public function cadastrarPlano(PlanoModel $plano) {
        try {
            $sql = "INSERT INTO planos (nome, valor, descricao, duracao, beneficios, status) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $plano->getNome(),
                $plano->getValor(),
                $plano->getDescricao(),
                $plano->getDuracao(),
                $plano->getBeneficios(),
                $plano->getStatus()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar plano: " . $e->getMessage();
            return false;
        }
    }

    public function buscarTodos() {
        try {
            $sql = "SELECT * FROM planos";
            return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar planos: " . $e->getMessage();
            return [];
        }
    }
}
?>
