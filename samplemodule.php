<?php

/**
 * Sample Prestashop Module
 *
 * Module de démonstration des différents principes prestashop
 *
 * @author Hhennes
 *
 */

//Inclusion du modèle Sample
require_once _PS_MODULE_DIR_ . '/samplemodule/classes/Sample.php';

class SampleModule extends Module
{
    public function __construct()
    {
        $this->author = 'hhennes';
        $this->name = 'samplemodule';
        $this->tab = 'hhennes';
        $this->version = '0.1.1';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Prestashop sample Module');
        $this->description = $this->l('Prestashop sample Module with front controller');
    }

    /**
     * Installation du module
     * @return boolean
     */
    public function install()
    {
        return parent::install() && $this->_installSql() && $this->_installTab();
    }

    /**
     * Désinstallation du module
     * @return boolean
     */
    public function uninstall()
    {
        return parent::uninstall() && $this->_uninstallSql() && $this->_uninstallTab();
    }

    /**
     * Création de la base de donnée de l'objet
     * @return boolean
     */
    protected function _installSql()
    {
        $sqlCreate = "CREATE TABLE `" . _DB_PREFIX_ . Sample::$definition['table'] . "` (
                `id_sample` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `name` varchar(255) DEFAULT NULL,
                `code` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `date_add` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                `date_upd` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (`id_sample`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $sqlCreateLang = "CREATE TABLE `" . _DB_PREFIX_ . Sample::$definition['table'] . "_lang` (
              `id_sample` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `id_lang` int(11) NOT NULL,
              `title` varchar(255) DEFAULT NULL,
              `description` text,
              PRIMARY KEY (`id_sample`,`id_lang`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        return Db::getInstance()->execute($sqlCreate) && Db::getInstance()->execute($sqlCreateLang);
    }

    /**
     * Installation du controller dans la backoffice
     * @return boolean
     */
    protected function _installTab()
    {
        $tab = new Tab();
        $tab->class_name = 'AdminHhSample';
        $tab->module = $this->name;
        $tab->id_parent = (int)Tab::getIdFromClassName('DEFAULT');
        $tab->icon = 'settings_applications';
        $languages = Language::getLanguages();
        foreach ($languages as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('HH Sample Admin controller');
        }
        try {
            $tab->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * Désinstallation du controller admin
     * @return boolean
     */
    protected function _uninstallTab()
    {
        $idTab = (int)Tab::getIdFromClassName('AdminHhSample');
        if ($idTab) {
            $tab = new Tab($idTab);
            try {
                $tab->delete();
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return true;
    }

    /**
     * Suppression de la base de données
     */
    protected function _uninstallSql()
    {
        $sql = "DROP TABLE "._DB_PREFIX_.Sample::$definition['table'].","._DB_PREFIX_.Sample::$definition['table']."_lang";
        return Db::getInstance()->execute($sql);
    }
}
