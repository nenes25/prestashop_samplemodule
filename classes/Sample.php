<?php
/**
 * 2002-2018 ADVISA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is available
 * through the world-wide-web at this URL: http://www.opensource.org/licenses/OSL-3.0
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to mage@advisa.fr so we can send you a copy immediately.
 *
 * @author ADVISA
 * @copyright 2002-2018 ADVISA
 * @license http://www.opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

class Sample extends ObjectModel
{

    public $id;
    public $name;
    public $code;
    public $email;
    public $title;
    public $description;

    public static $definition = [
        'table' => 'hh_sample',
        'primary' => 'id_sample',
        'multilang' => true,
        'fields' => [
            // Champs Standards
            'name' => ['type' => self::TYPE_STRING, 'validate' => 'isName', 'size' => 255, 'required' => true],
            'code' => ['type' => self::TYPE_STRING, 'validate' => 'isLinkRewrite', 'size' => 255, 'required' => true],
            'email' => ['type' => self::TYPE_STRING, 'validate' => 'isEmail', 'size' => 255, 'required' => true],
            //Champs langue
            'title' => ['type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'size' => 255,],
            'description' => ['type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml',],
        ],
    ];
}
