<?php
require_once "C:/Turma2/xampp/htdocs/vivalcris/Model/AlimentoModel.php";

class AlimentoController {
    private $alimentoModel;

    public function __construct($pdo){
        $this->alimentoModel = new AlimentoModel($pdo);
    }

    public function cadastrarAlimento($nome, $porcao, $porcao_por_aluno, $id_cardapio){
        return $this->alimentoModel->cadastrarAlimento($nome, $porcao, $porcao_por_aluno, $id_cardapio);
    }

    public function listarAlimentosDoCardapio($id_cardapio){
        return $this->alimentoModel->listarAlimentosDoCardapio($id_cardapio);
    }
}

?>