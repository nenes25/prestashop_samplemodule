<?php
/**
 * Sample Prestashop Module
 *
 * Module declaration
 *
 * @author Hhennes - https://www.h-hennes.fr/blog/
 *
 */

class samplemodulesampleModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('sample.tpl');
    }
}