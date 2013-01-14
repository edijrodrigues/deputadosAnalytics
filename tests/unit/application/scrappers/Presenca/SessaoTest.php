<?php
namespace DA\Tests\Scrapper;

class PresencaSessaoTest extends \Base\Scrapper
{
    
    protected function setUp() {
        parent::setUp('DA\Scrapper\Presenca\Sessao');        
    }
    
    public function testGetPresencas()
    {
        $this->setDataFromUrl('url.presencaPlenario');
        
        $urlParams = array(
            'legislatura'    => 54,
            'last3Matricula' => 1,
            'dataInicio'     => '01/11/2011',
            'dataFim'        => '11/12/2012'
        );

        $data = $this->scrapper->getPresencas(1, $urlParams);

        $this->assertTrue(is_array($data[0]));
        $this->assertTrue(is_numeric($data[0]['deputadoId']));
        $this->assertTrue(is_string($data[0]['data']));
        $this->assertTrue(is_string($data[0]['justificativa']));
        $this->assertTrue(is_string($data[0]['titulo']));
        $this->assertTrue(is_string($data[0]['comportamento']));
    }
}