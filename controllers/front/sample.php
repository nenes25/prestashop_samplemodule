<?php
/**
 * Sample Prestashop Module
 *
 * Front Controller
 *
 * @author Hhennes - https://www.h-hennes.fr/blog/
 *
 */
class samplemodulesampleModuleFrontController extends ModuleFrontController
{

    /**
     * Manage Post Process
     */
    public function postProcess()
    {
        //Sample translated error message
        $this->errors[] = $this->l('Translated error');
        parent::postProcess();
    }

    /**
     * Define controller content and template
     * @throws PrestaShopException
     */
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('sample.tpl');
    }

    /**
     * Translate controller strings
     * @param $string
     * @return string
     */
    protected function l($string)
    {
        return $this->module->l($string,
           'sample' //File name without extension
        );
    }
}