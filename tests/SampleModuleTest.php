<?php

class SampleModuleTest extends PHPUnit_Extensions_Selenium2TestCase
{
    /** Url du site  */
    protected $_site_url = 'http://localhost/prestashop/';

    /**
     * Initialisation de la classe de test
     */
    public function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl($this->_site_url);
    }


    /**
     * Test du bon affichage du texte du module sur le front office
     * @param string $version version de prestashop à tester
     * @dataProvider getPrestashopVersions
     */
    public function testDisplayText($version)
    {

        //On charge l'url du controller front Office du module
        $this->url('prestashop_'.$version.'/index.php?fc=module&module=samplemodule&controller=sample');

        //Si vous voulez visualiser ce que le navigateur vois
        $image = $this->currentScreenshot();
        file_put_contents(dirname(__FILE__).'screenshot'.time().'.jpg', $image);

        //On s'assure que le contenu du block central est bien égal à "It works"
        $this->assertEquals($this->byId('center_column')->text(),'It works');
    }


    /**
     * Récupération des version de prestashop installée pour les tests
     * @todo Récupérer automatiquement les versions de prestashop installées
     */
    public function getPrestashopVersions()
    {
         return array(
                array('1-5-6-3'),
                array('1-6-0-14'),
                array('1-6-1-1'),
        );

    }

}