<?php

require_once 'Conexao.php';
require_once __DIR__ . '/../Model/TreinoModel.php';

class TreinoDAO {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->fazConexao();
    }

    // Criar treino
    public function cadastrarTreino(TreinoModel $treino) {
        try {
            $sql = "INSERT INTO treino (nome, descricao, dias, tempo, grupomuscular, dataexecucao)
                    VALUES (:nome, :descricao, :dias, :tempo, :grupomuscular, :dataexecucao)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(':nome', $treino->getNome());
            $stmt->bindValue(':descricao', $treino->getDescricao());
            $stmt->bindValue(':dias', $treino->getDias());
            $stmt->bindValue(':tempo', $treino->getTempo());
            $stmt->bindValue(':grupomuscular', $treino->getGrupoMuscular());
            $stmt->bindValue(':dataexecucao', $treino->getDataExecucao());

            $res = $stmt->execute();

            if ($res) {
                echo "<script>alert('Treino cadastrado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar treino!');</script>";
            }

            echo "<script>location.href='../Login/treino.php';</script>";

        } catch (PDOException $e) {
            echo "Erro no cadastro do treino: " . $e->getMessage();
        }
    }

    // Listar todos os treinos
    public function listarTreinos() {
        try {
            $sql = "SELECT * FROM treino";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar treinos: " . $e->getMessage();
            return [];
        }
    }

    // Buscar treino por ID
    public function buscarTreinoPorId($idtreino) {
        try {
            $sql = "SELECT * FROM treino WHERE idtreino = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$idtreino]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar treino: " . $e->getMessage();
            return null;
        }
    }

    // Atualizar treino
    public function editarTreino(TreinoModel $treino) {
        try {
            $sql = "UPDATE treino SET 
                        nome = ?, descricao = ?, dias = ?, tempo = ?, grupomuscular = ?, dataexecucao = ?
                    WHERE idtreino = ?";
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                $treino->getNome(),
                $treino->getDescricao(),
                $treino->getDias(),
                $treino->getTempo(),
                $treino->getGrupoMuscular(),
                $treino->getDataExecucao(),
                $treino->getIdTreino()
            ]);
        } catch (PDOException $e) {
            echo "Erro ao editar treino: " . $e->getMessage();
            return false;
        }
    }

    // Excluir treino
    public function excluirTreino($idtreino) {
        try {
            $sql = "DELETE FROM treino WHERE idtreino = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$idtreino]);
        } catch (PDOException $e) {
            echo "Erro ao excluir treino: " . $e->getMessage();
            return false;
        }
    }
}
?>
