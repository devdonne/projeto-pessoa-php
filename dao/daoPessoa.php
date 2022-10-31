<?php
  declare(strict_types=1);
  namespace dao;
  use Conexao;

  class DaoPessoa{
    private $pessoa;
    private $conexao;

    public function __construct($pessoa)
    {
      $pdo = new Conexao();
      $this->conexao = $pdo->getConexao();
      $this->pessoa = $pessoa;
    }

    public function inserir(): int {
      $sql = 'insert into pessoa(cpf, nome, idade) value (?, ?, ?)';

      $prepare = $this->conexao->prepare($sql);
      
      $cpf = $this->pessoa->getCPF();
      $nome = $this->pessoa->getNome();
      $idade = $this->pessoa->getIdade();

      $prepare->bindParam(1, $cpf);
      $prepare->bindParam(2, $nome);
      $prepare->bindParam(3, $idade);

      $prepare->execute();

      return $prepare->rowCount();
 
    }
    public function listar(): array{ 
      $sql = 'select * from pessoa';

      $pessoas =  [];
      
      foreach($this->conexao->query($sql) as $value){
        array_push($pessoas, $value);
      }
      return $pessoas;
    }

    public function deletar(): int { 
      $sql = 'delete from pessoa where cpf = ?';

      $prepare = $this->conexao->prepare($sql);
      $cpf = $this->pessoa->getCPF();
      $prepare->bindParam(1, $cpf);

      if (!empty($this->pessoa->getNome())){
        $nome = $this->pessoa->getNome();
        $sql.' and nome = ?';
        $prepare->bindParam(2, $nome);
      }

      $prepare->execute();

      return $prepare->rowCount();
    }
    public function atualizar(): int { 

      $sql = 'update pessoa set nome = ?, idade = ? where cpf = ?';

      $prepare = $this->conexao->prepare($sql);

      $cpf = $this->pessoa->getCPF();
      $nome = $this->pessoa->getNome();
      $idade = $this->pessoa->getIdade();

      $prepare->bindParam(1, $nome);
      $prepare->bindParam(2, $idade);
      $prepare->bindParam(3, $cpf);

      $prepare->execute();

      return $prepare->rowCount();
    }
}