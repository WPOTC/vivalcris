<?php

class AlimentoModel {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function cadastrarAlimento($nome, $porcao, $porcao_por_aluno, $id_cardapio){
        $sql = "INSERT INTO alimento (nome, porcao, porcao_por_aluno, id_cardapio) VALUES (:nome, :porcao, :porcao_por_aluno, :id_cardapio)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':porcao', $porcao);
        $stmt->bindParam(':porcao_por_aluno', $porcao_por_aluno);
        $stmt->bindParam(':id_cardapio', $id_cardapio);
        return $stmt->execute();
    }

    public function listarAlimentosDoCardapio($id_cardapio){
        $sql = "SELECT * FROM alimento WHERE id_cardapio = :id_cardapio";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_cardapio', $id_cardapio);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
}

?>