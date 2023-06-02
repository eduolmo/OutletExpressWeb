<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class BuscaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function buscarResultadosNaPaginaTest(AcceptanceTester $I)
    {
		$I = new AcceptanceTester($scenario);
		$I->amOnPage('/outlet-web/html/index.html');
		$I->click('MAIS VENDIDOS');
		$I->seeCurrentURLEquals('/outlet-web/html/produtos.html');
		$I->click('Carrinho de Bebê Premium Preto Importado');
		$I->seeCurrentURLEquals('/outlet-web/html/carrinhoBebe.html');
		$I->see('Carrinho de Bebê Premium Preto Importado');
    }
}
