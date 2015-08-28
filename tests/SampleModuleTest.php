<?php

class SampleModuleTest extends PHPUnit_Extensions_Selenium2TestCase
{
    /** Url du site  */
    protected $_site_url = 'http://localhost/prestashop/';

    /** Versions cibles du module ( 1.4 | 1.5 | 1.6 | ALL ) */
    protected $_targeted_versions = 'ALL';

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
        $this->url($version.'/index.php?fc=module&module=samplemodule&controller=sample');

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
        $prestashop_dir = dirname(__FILE__).'/../../../';
        $dir            = opendir($prestashop_dir);

        $versions = array();

        //Récupération de toutes les versions prestashop installées
        while ($item = readdir($dir)) {
            if (is_dir($prestashop_dir.$item) && preg_match('#prestashop#',$item)) {
                //En fonction des paramètres du module on inclus seulement les version cibles
                if ($this->_targeted_versions != 'ALL') {
                    if (preg_match('#'.str_replace('.', '-', $this->_targeted_versions).'#', $item))
                            $versions[] = array($item);
                }
                // Si on cible toutes les versions on inclus tout
                else {
                    $versions[] = array($item);
                }
            }
        }
        
       return $versions;
    }
}