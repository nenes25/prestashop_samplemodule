<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sample
 *
 * @author advisa
 */
class hh_samplemodulesampleModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();

        /** @todo Essayer de mettre un template particulier*/
        $this->setTemplate('module:hh_samplemodule/views/templates/front/sample.tpl');
    }
}
