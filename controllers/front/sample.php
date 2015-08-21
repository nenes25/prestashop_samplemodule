<?php

class samplemodulesampleModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('sample.tpl');
    }
}