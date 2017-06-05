<?php

/**
 * Created by PhpStorm.
 * User: herve
 * Date: 03/06/2017
 * Time: 22:58
 */
class Product extends ProductCore
{

    public $qeoo_author_id;

    public function __construct($id_product = null, $full = false, $id_lang = null, $id_shop = null, Context $context = null)
    {
        self::$definition['fields']['qeoo_author_id'] = array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId');
        parent::__construct($id_product, $full, $id_lang, $id_shop, $context);
    }

}