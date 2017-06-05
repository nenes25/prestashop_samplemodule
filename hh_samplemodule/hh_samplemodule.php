<?php
/**
 * Description of hh_samplemodule
 *
 * @author advisa
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class Hh_Samplemodule extends Module implements WidgetInterface
{

    public function __construct()
    {
        $this->name = 'hh_samplemodule';
        $this->version = '0.1.0';
        $this->author = 'hhennes';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->trans('Sample Module', array(), 'Modules.HhSample.Admin');
        $this->description = $this->trans('Sample Module to discover PS 1.7 dev', array(), 'Modules.HhSample.Admin');

        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
    }

    /**
     * Installation du module
     * @return type
     */
    public function install() {
        return parent::install();
    }

    /**
     * Désintallation du module
     * @return type
     */
    public function uninstall() {
     return parent::unistall();
    }


    /**
     * Affichage du widget
     * @param type $hookName
     * @param array $configuration
     * @return array
     */
    public function renderWidget($hookName = null, array $configuration = []) {

        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->display(__FILE__, 'views/templates/widget/sample.tpl');

    }

    /**
     * Récupération des variables du widget
     * @param type $hookName
     * @param array $configuration
     * @return array
     */
    public function getWidgetVariables($hookName = null , array $configuration = [] ){

        return  [
            'test' => 'test_var',
            'test2'=> 'test_var2'
            ];

    }

    /**
     * Gestion Back-Office ( Inchangé )
     */
    public function getContent() {

        return 'It works';

    }
}
