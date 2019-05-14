<?php
/**
 * Sample Prestashop Module
 *
 * Module declaration
 *
 * @author Hhennes - https://www.h-hennes.fr/blog/
 *
 */

require_once _PS_MODULE_DIR_ . '/samplemodule/classes/Sample.php';

class AdminHhSampleController extends ModuleAdminController
{

    /**
     * Instanciation de la classe
     * Définition des paramètres basiques obligatoires
     */
    public function __construct()
    {
        $this->bootstrap = true; //Gestion de l'affichage en mode bootstrap
        $this->table = Sample::$definition['table']; //Table de l'objet
        $this->identifier = Sample::$definition['primary']; //Clé primaire de l'objet
        $this->className = Sample::class; //Classe de l'objet
        $this->lang = true; //Flag pour dire si utilisation de langues ou non

        //Appel de la fonction parente pour pouvoir utiliser la traduction ensuite
        parent::__construct();

        //Liste des champs de l'objet à afficher dans la liste
        $this->fields_list = [
            'id_sample' => [ //nom du champ sql
                'title' => $this->module->l('ID'),
                'align' => 'center',
                'class' => 'fixed-width-xs'
            ],
            'name' => [
                'title' => $this->module->l('name'),
                'align' => 'left',
            ],
            'code' => [
                'title' => $this->module->l('code'),
                'align' => 'left',
            ],
            'email' => [
                'title' => $this->module->l('email'),
                'align' => 'left',
            ],
            'title' => [
                'title' => $this->module->l('title'),
                'lang' => true,
                'align' => 'left',
            ]
        ];

        //Ajout d'action sur chaque ligne
        $this->addRowAction('edit');
        $this->addRowAction('delete');
    }

    /**
     * Affichage du formulaire d'ajout / création de l'objet
     * @return string
     * @throws SmartyException
     */
    public function renderForm()
    {
        //Définition du formulaire d'édition
        $this->fields_form = [
            //Entête
            'legend' => [
                'title' => $this->module->l('Edit Sample'),
                'icon' => 'icon-cog'
            ],
            //Champs
            'input' => [
                [
                    'type' => 'text', //Type de champ
                    'label' => $this->module->l('name'), //Label
                    'name' => 'name', //Nom
                    'class' => 'input fixed-width-sm', //classes css
                    'size' => 50, //longueur maximale du champ
                    'required' => true, //Requis ou non
                    'empty_message' => $this->l('Please fill the postcode'), //Message d'erreur si vide
                    'hint' => $this->module->l('Enter sample name') //Indication complémentaires de saisie
                ],
                [
                    'type' => 'text',
                    'label' => $this->module->l('code'),
                    'name' => 'code',
                    'class' => 'input fixed-width-sm',
                    'size' => 5,
                    'required' => true,
                    'empty_message' => $this->module->l('Please fill the code'),
                ],
                [
                    'type' => 'text',
                    'label' => $this->module->l('email'),
                    'name' => 'email',
                    'class' => 'input fixed-width-sm',
                    'size' => 5,
                    'required' => true,
                    'empty_message' => $this->module->l('Please fill email'),
                ],
                [
                    'type' => 'text',
                    'label' => $this->module->l('Title'),
                    'name' => 'title',
                    'class' => 'input fixed-width-sm',
                    'lang' => true, //Flag pour utilisation des langues
                    'required' => true,
                    'empty_message' => $this->l('Please fill the title'),
                ],
                [
                    'type' => 'textarea',
                    'label' => $this->module->l('Description'),
                    'name' => 'description',
                    'lang' => true,
                    'autoload_rte' => true, //Flag pour éditeur Wysiwyg
                ],
            ],
            //Boutton de soumission
            'submit' => [
                'title' => $this->l('Save'), //On garde volontairement la traduction de l'admin par défaut
            ]
        ];
        return parent::renderForm();
    }


    /**
     * Gestion de la toolbar
     */
    public function initPageHeaderToolbar()
    {

        //Bouton d'ajout
        $this->page_header_toolbar_btn['new'] = array(
            'href' => self::$currentIndex . '&add' . $this->table . '&token=' . $this->token,
            'desc' => $this->module->l('Add new Sample'),
            'icon' => 'process-icon-new'
        );

        parent::initPageHeaderToolbar();
    }
}
