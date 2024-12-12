<?php
class Veiculo
{
    private $conn;
    private $table_name = "veiculos";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para cadastrar uma notícia no banco
    public function cadastrar($placa, $modelo, $marca, $ano)
    {
        $query = "INSERT INTO " . $this->table_name . " (placa, modelo, marca, ano)
                  VALUES (:placa, :modelo, :marca, :ano)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':placa', $placa);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':ano', $ano);
        return $stmt->execute();
    }
    public function atualizarVeiculo($id,$placa,$modelo,$marca,$ano)
    {
        try {
            // Verificar se o veiculo_id existe na tabela 'veiculos'
            if ($id !== null) {
                $queryVeiculo = "SELECT id FROM veiculos WHERE id = :id LIMIT 1";
                $stmtVeiculo = $this->conn->prepare($queryVeiculo);
                $stmtVeiculo->bindParam(':veiculo_id', $id, PDO::PARAM_INT);
                $stmtVeiculo->execute();

                if ($stmtVeiculo->rowCount() == 0) {
                    throw new Exception("O ID do veículo fornecido não existe.");
                }
            }

            // Atualiza os dados do cliente
            $query = "UPDATE veiculos SET placa = :placa, modelo = :modelo, marca = :marca,ano = :ano WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            // Bind dos parâmetros
            $stmt->bindParam(':placa', $placa, PDO::PARAM_STR);
            $stmt->bindParam(':modelo ', $modelo, PDO::PARAM_STR);
            $stmt->bindParam(':marca', $marca, PDO::PARAM_STR);
            $stmt->bindParam(':ano', $ano, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Executa a consulta
            if ($stmt->execute()) {
                return true; // Retorna verdadeiro se a atualização for bem-sucedida
            } else {
                throw new Exception("Erro ao atualizar os dados do veiculo.");
            }
        } catch (PDOException $e) {
            throw new Exception('Erro ao atualizar veiculo: ' . $e->getMessage());
        }
    }
    // FUNÇÃO PARA CRIAR A CAIXA DE SELEÇÃO E OBTER OS VEICULOS CADASTRADOS NO SISTEMA 
    public function obterVeiculos($id = null) {
        // Base da consulta
        $query = "SELECT id, modelo FROM " . $this->table_name;
    
        // Adiciona cláusula WHERE se o ID for fornecido
        if ($id !== null) {
            $query .= " WHERE id = ?";
        }
        $stmt = $this->conn->prepare($query);
        if ($id !== null) {
            $stmt->execute([$id]);
        } else {
            $stmt->execute();
        }
        if ($id !== null) {
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    public function buscarVeiculo($id)
    {
        
        try {
            // SQL para selecionar os dados do cliente
            $query = "SELECT * FROM veiculos WHERE id = :id LIMIT 1";
            $stmt = $this->conn->prepare($query);

            // Bind do ID à consulta
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Executa a consulta
            $stmt->execute();

            // Verifica se encontrou o cliente
            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return null; 
            }
        } catch (PDOException $e) {
            throw new Exception('Erro ao buscar veiculo: ' . $e->getMessage());
        }
    }
    public function deletar($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
    public function lerPorId($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function ler()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
