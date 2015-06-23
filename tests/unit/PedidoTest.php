<?php

class PedidoTest extends PHPUnit_Framework_TestCase
{
	public static function setUpBeforeClass()
	{
		echo "Iniciando os Testes\n";
	}
	
	public static function tearDownAfterClass()
	{
		echo "Finalizando os Testes\n";
	}
	
	private $pedido;
	protected function setUp()
	{
		$this->pedido = new Pedido();
	}
	
	/**
	 * @test
	 */
	public function ListaDePedidosDeveConter0Itens()
	{
		// Arrange
		
		
		// Act
		$pedidoItens = $this->pedido->getPedidoItens();
		
		// Assert
		$this->assertCount(0, $pedidoItens);
		
	}
	
	/**
	 * @test
	 */
	public function AoAdicionarProdutoAListaDeveraConterApenas1Item()
	{
		// Arrange
		$produto = new Produto(1, "PlayStation", 5, 999);
		// Act
		$this->pedido->addItemPedido($produto, 2);
		$pedidoitens = $this->pedido->getPedidoItens();
		// Assert
		$this->assertCount(1, $pedidoitens);
		$this->assertEquals(array($produto, 2), $pedidoitens[0]);
	}
}

?>