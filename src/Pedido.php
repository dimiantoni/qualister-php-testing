<?php

	class Pedido
	{
		private $pedidoItens = array();
		
		public function getPedidoItens()
		{
			return $this->pedidoItens;
		}

	public function addItemPedido(Produto $produto, $quantidade)
	{
		$this->pedidoItens[] = array($produto, $quantidade);
	}
				
	}

?>