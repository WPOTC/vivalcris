<?php
require_once "C:/Turma2/xampp/htdocs/vivalcris/Model/CardapioModel.php";

class CardapioController {
    private $cardapioModel;

    public function __construct($pdo){
        $this->cardapioModel = new CardapioModel($pdo);
    }

    public function cadastrarCardapio($nome, $tipo_refeicao, $data){
        return $this->cardapioModel->cadastrarCardapio($nome, $tipo_refeicao, $data);
    }

    public function listarCardapios(){
        return $this->cardapioModel->listarCardapios();
    }

    public function procurarCardapioPorData($data){
        return $this->cardapioModel->procurarCardapioPorData($data);
    }

    public function recuperacaoValoresCalculoPorcoes($id_cardapio){
        return $this->cardapioModel->recuperacaoValoresCalculoPorcoes($id_cardapio);
    }

    public function editarCardapio($id_cardapio, $nome, $tipo_refeicao, $data){
        return $this->cardapioModel->editarCardapio($id_cardapio, $nome, $tipo_refeicao, $data);
    }
}

?>