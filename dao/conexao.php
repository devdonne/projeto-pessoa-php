<?php
declare(strict_types=1);
  class Conexao{
    private $conexao;
    public function __construct()
    {
      try{
        $this->conexao = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '');
        if ($this->conexao==null)
          throw new Exception('Erro na Conexão');
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

    public function getConexao(): PDO{
      return $this->conexao;
    }
  }