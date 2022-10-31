<?php
  namespace modelo;
  class Pessoa{
    private String $cpf;
    private String $nome;
    private float $idade;

    public function __construct(String $cpf,  String $nome, float $idade)
    { 
      $this->cpf = $cpf;
      $this->nome = $nome;
      $this->idade = $idade;
    }
  	/**
	 * @return string
	 */
	function getNome(): string {
		return $this->nome;
	}
	
	/**
	 * @param string $nome 
	 * @return Pessoa
	 */
	function setNome(string $nome): self {
		$this->nome = $nome;
		return $this;
	}
	/**
	 * @return float
	 */
	function getIdade(): float {
		return $this->idade;
	}
	/**
	 * @param float $idade 
	 * @return Pessoa
	 */
	function setIdade(float $idade): self {
		$this->idade = $idade;
		return $this;
	}
	/**
	 * @param string $cpf 
	 * @return Pessoa
	 */
	function setCpf(string $cpf): self {
		$this->cpf = $cpf;
		return $this;
	}
	/**
	 * @return string
	 */
	function getCpf(): string {
		return $this->cpf;
	}
}