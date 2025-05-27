<?php

require_once 'Conexao.php';
require_once __DIR__ . '/../Model/UserModel.php';

class UserDAO {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->fazConexao();
    }

    public function cadastrarUser(UserModel $user) {
        try {
            $sql = "INSERT INTO user
                (nomeuser, cpf, email, telefone, dataNascimento, genero, endereco, cidade, estado, cep, info_medica, senha)
                VALUES
                (:nomeuser, :cpf, :email, :telefone, :dataNascimento, :genero, :endereco, :cidade, :estado, :cep, :info_medica, :senha)";

            $stmt = $this->conn->prepare($sql);

            $senhaHash = password_hash($user->getSenha(), PASSWORD_DEFAULT);

            $stmt->bindValue(':nomeuser', $user->getNomeuser());
            $stmt->bindValue(':cpf', $user->getCpf());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':telefone', $user->getTelefone());
            $stmt->bindValue(':dataNascimento', $user->getDataNascimento());
            $stmt->bindValue(':genero', $user->getGenero());
            $stmt->bindValue(':endereco', $user->getEndereco());
            $stmt->bindValue(':cidade', $user->getCidade());
            $stmt->bindValue(':estado', $user->getEstado());
            $stmt->bindValue(':cep', $user->getCep());
            $stmt->bindValue(':info_medica', $user->getInfoMedica());
            $stmt->bindValue(':senha', $senhaHash);

            $res = $stmt->execute();

            if ($res) {
                echo "<script>alert('Cadastro realizado com sucesso');</script>";
            } else {
                echo "<script>alert('Erro: Não foi possível realizar o cadastro');</script>";
            }

            echo "<script>location.href='../Login/login.php?op=Listar';</script>";

        } catch (PDOException $e) {
            echo "Erro no cadastro: " . $e->getMessage();
        }
    }

    public function alterarUser(UserModel $user) {
        try {
            $sql = "UPDATE user SET
                nomeuser = ?, cpf = ?, email = ?, telefone = ?, dataNascimento = ?, genero = ?,
                endereco = ?, cidade = ?, estado = ?, cep = ?, info_medica = ?, senha = ?
                WHERE iduser = ?";

            $stmt = $this->conn->prepare($sql);

            $senhaHash = password_hash($user->getSenha(), PASSWORD_DEFAULT);

            $stmt->execute([
                $user->getNomeuser(),
                $user->getCpf(),
                $user->getEmail(),
                $user->getTelefone(),
                $user->getDataNascimento(),
                $user->getGenero(),
                $user->getEndereco(),
                $user->getCidade(),
                $user->getEstado(),
                $user->getCep(),
                $user->getInfoMedica(),
                $senhaHash,
                $user->getIduser()
            ]);

            return true;
        } catch (PDOException $e) {
            echo "Erro ao alterar: " . $e->getMessage();
            return false;
        }
    }

    public function excluirUser($iduser) {
        try {
            $sql = "DELETE FROM user WHERE iduser = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$iduser]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
            return false;
        }
    }

    public function buscarTodos() {
        try {
            $sql = "SELECT * FROM user";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            return [];
        }
    }

    public function buscarPorCPF($cpf) {
        try {
            $sql = "SELECT * FROM user WHERE cpf = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$cpf]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar por CPF: " . $e->getMessage();
            return null;
        }
    }
}
?>
