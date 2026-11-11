<?php

class CardapioModel {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function cadastrarCardapio($nome, $tipo_refeicao, $data){
        $sql = "INSERT INTO cardapio (nome, tipo_refeicao, data) VALUES (:nome, :tipo_refeicao, :data)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo_refeicao', $tipo_refeicao);
        $stmt->bindParam(':data', $data);
        return $stmt->execute();
    }

    public function listarCardapios(){
        $sql = "SELECT * FROM cardapio";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function procurarCardapioPorData($data){
        $sql = "SELECT * FROM cardapio WHERE data = :data";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function recuperacaoValoresCalculoPorcoes($id_cardapio){
        $sqlAlunosPresentes = "SELECT SUM(presencas) AS total_alunos FROM chamada WHERE data = (SELECT data FROM cardapio WHERE id_cardapio = :id_cardapio)";
        $stmtAlunosPresentes = $this->pdo->prepare($sqlAlunosPresentes);
        $stmtAlunosPresentes->bindParam(':id_cardapio', $id_cardapio);
        $stmtAlunosPresentes->execute();
        $totalPresencas = $stmtAlunosPresentes->fetch(PDO::FETCH_ASSOC)['total_alunos'];

        $sqlAlimentos = "SELECT * FROM alimento WHERE id_cardapio = :id_cardapio";
        $stmtAlimentos = $this->pdo->prepare($sqlAlimentos);
        $stmtAlimentos->bindParam(':id_cardapio', $id_cardapio);
        $stmtAlimentos->execute();
        $stmtAlimentos->fetchAll(PDO::FETCH_ASSOC);

        return [
            'total_alunos_presentes' => $totalPresencas,
            'alimentos' => $stmtAlimentos
        ];
    }

    public function editarCardapio($id_cardapio, $nome, $tipo_refeicao, $data){
        $sql = "UPDATE cardapio SET nome = :nome, tipo_refeicao = :tipo_refeicao, data = :data WHERE id_cardapio = :id_cardapio";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_cardapio', $id_cardapio);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo_refeicao', $tipo_refeicao);
        $stmt->bindParam(':data', $data);
        return $stmt->execute();
    }
}

?>