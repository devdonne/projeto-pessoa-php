<?php
  //declare(strict_types=1);
  use modelo\Pessoa;
  use dao\DaoPessoa;
  spl_autoload_register();

  function mensagem_de_erro(String $mensagem){
    $_SESSION['mensagem-de-erro'] = $mensagem;
    header('location: index.php');
  }  
  function inserir(){
    session_start();
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    try{
      if (empty($cpf) or empty($nome) or $idade == null){
        throw new Exception('Preecha os campos vazios');
      }else if(strlen($cpf)< 11 or strlen($cpf) > 11){
        throw new Exception('CPF inválido!');
      }else if (!is_numeric($idade)){
        throw new Exception('Idade inválida!');
      }else if (strlen($nome) > 40){
        throw new Exception('Nome excedeu o limite!');
      }else{
        $idade = (int) $idade;
        $pessoa = new Pessoa($cpf, $nome, $idade);
        $dao = new DaoPessoa($pessoa);
        $result = $dao->inserir();
        echo $result.'';
      }
    }catch (Exception $e){
      mensagem_de_erro($e->getMessage());
      die();
    }
  }
  function listar(){
    $dao = new DaoPessoa(null);
    $result = $dao->listar();
    foreach($result as $value){
      echo 'CPF:'.$value['cpf'].'<br>NOME:'.$value['nome'].'<br>IDADE:'.$value['idade'].'<br><br>';
    }
  }
  
  if (isset($_POST["salvar"])){
    inserir();
  }else if (isset($_POST['listar'])){
    listar();
  }else if (isset($_POST['atualizar']) or (isset($_POST['excluir']))){
    mensagem_de_erro('Ainda não implementado');
  }