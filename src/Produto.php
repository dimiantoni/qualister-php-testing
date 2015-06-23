<?php

class Produto
{
	private $produtoId;
	private $produtoNome;
	private $produtoEstoque;
	private $produtoValor;

	public function __construct($id, $nome, $estoque, $valor)
	{
			$this->produtois = $id;
			$this->produtoNome = $nome;
			$this->produtoEstoque = $estoque;
			$this->produtoValor = $valor;
	}

}

?>