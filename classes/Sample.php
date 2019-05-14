<?php
/**
 * Sample Prestashop Module
 *
 * Module declaration
 *
 * @author Hhennes - https://www.h-hennes.fr/blog/
 *
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
