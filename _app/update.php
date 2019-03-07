<?php

include_once './Config.inc.php';

const tabela = "item";

//Script com a conexão ao banco de dados
if (isset($_POST['item']) && $_POST['item'] != 0) { //$_POST['id'] != 0 (em caso de tabela auto incremento o id será do tipo inteiro e nunca será iniciada em 0) isso em MySQL não sei outros Bancos de dados
  $up = new Update();
  $Dados = array("view" => "1");

  $up->ExeUpdate(self::tabela, $Dados, "WHERE id_item = :iditem", "iditem={$_POST['item']}");
}