<?php

class PedidoTest extends PHPUnit_Framework_TestCase
{
	public static function setUpBeforeClass()
	{
		echo "Iniciando os Testes\n";
	}
			
	private $pedido;
	protected function setUp()
	{
		$this->pedido = new Pedido();
	}
	
	/**
	 * @test
	 * @group Importantes
	 * @author Dimi
	 * @small
	 * @covers Pedido
	 * @covers Pedido::getPedidoitens
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
	 * @group Importantes
	 * @author Antoni
	 * @medium
	 * @covers Pedido
	 * @covers Pedido::addItemPedido
	 * @covers Produto
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
	
	/**
	 * @test
	 * @author Dimi
	 * @covers PedidoServicos
	 * @covers PedidosServicos::salvar
	 * @covers Pedidos
	 * @covers Pedidos::addItemPedido
	 * @covers Pedidos::getPedidoItens
	 * @covers Produto
	 * @dataProvider dataAdicionar2ProdutosSalvarPedidoEReceberMensagemDeSucesso
	 */
	public function adicionar2ProdutosSalvarPedidoEReceberMensagemDeSucesso(
		$id1,$nome1,$est1,$val1,$qtd1,$id2,$nome2,$est2,$val2, $qtd2,$resp		
	)
	{
		// Arrange
		$produto1 = new Produto($id1, $nome1, $est1, $val1);
		$produto2 = new Produto($id2, $nome2, $est2, $val2);
		$pedidoservicos = new PedidoServicos();
		// Act
		$this->pedido->addItemPedido($produto1, $qtd1);
		$this->pedido->addItemPedido($produto2, $qtd2);
		$status = $pedidoservicos->salvar($this->pedido);
		// Assert
		$this->assertEquals($resp, $status);
	}
	
	function dataAdicionar2ProdutosSalvarPedidoEReceberMensagemDeSucesso()
	{
		return array_map(
			'str_getcsv',
			file('tests/ddt/adicionar2ProdutosSalvarPedidoEReceberMensagemDeSucesso.csv')
		);
		
		/* return array(
				array(1,"PS",5,99,2,2,"XB",10,12.80,5,"Sucesso"),
				array(2,"GB",5,88,2,2,"SS",8,16.70,4,"Sucesso"),
				array(3,"GG",5,95,2,2,"FL",1,13.90,3,"Sucesso")
		); */
	}
	
	/**
	 * @group excecoes
	 * @expectedException        Exception
	 * @expectedExceptionCode    20
	 * @expectedExceptionMessage Problema
	 */
	public function testLancarExceptionComUmaMensagemCodigo20()
	{
		throw new Exception("Problemas",20);
	}
	
	public static function tearDownAfterClass()
	{
		echo "Finalizando os Testes\n";
	}
}

?>