<?php

class Produto implements IProduto
{
	private $produtoId;
	private $produtoNome;
	private $produtoEstoque;
	private $produtoValor;

	public function __construct($produtoId,$produtoNome,$produtoEstoque, $produtoValor)
	{
			$this->produtoId = $produtoId;
			$this->produtoNome = $produtoNome;
			$this->produtoEstoque = $produtoEstoque;
			$this->produtoValor = $produtoValor;
	}

}
?>