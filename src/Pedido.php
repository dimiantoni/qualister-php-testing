<?php

class Pedido implements IPedido
{
	
	private $pedidoItens = array();
		
	public function getPedidoItens()
	{
		return $this->pedidoItens;
	}

	public function addItemPedido(IProduto $produto, $quantidade)
	{
		$this->pedidoItens[] = array($produto, $quantidade);
	}
		
}
?>