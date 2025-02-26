<?php
class Musico {
    private $conn;
    private $table_name = "musicos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar($apenasAtivos = true) {
        try {
            $query = "SELECT id, nome, instrumento, status FROM " . $this->table_name;
            if ($apenasAtivos) {
                $query .= " WHERE status = 1";
            }
            $query .= " ORDER BY nome";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch(PDOException $e) {
            throw $e;
        }
    }

    public function cadastrar($nome, $instrumento) {
        try {
            $query = "INSERT INTO " . $this->table_name . " (nome, instrumento) VALUES (:nome, :instrumento)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':instrumento', $instrumento);
            return $stmt->execute();
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function inativar($id) {
        try {
            $query = "UPDATE " . $this->table_name . " SET status = 0 WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            
            if (!$stmt->execute()) {
                throw new PDOException("Falha ao inativar o músico");
            }
            
            if ($stmt->rowCount() === 0) {
                throw new PDOException("Nenhum músico encontrado com o ID fornecido");
            }
            
            return true;
        } catch(PDOException $e) {
            throw $e;
        }
    }

    public function ativar($id) {
        try {
            $query = "UPDATE " . $this->table_name . " SET status = 1 WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            
            if (!$stmt->execute()) {
                throw new PDOException("Falha ao ativar o músico");
            }
            
            if ($stmt->rowCount() === 0) {
                throw new PDOException("Nenhum músico encontrado com o ID fornecido");
            }
            
            return true;
        } catch(PDOException $e) {
            throw $e;
        }
    }
}
