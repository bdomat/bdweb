<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class bdweb extends Module
{
    public function __construct()
    {
        $this->name = 'bdweb';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Bertrand Domat';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.5',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('BD WEB - Maintenance');
        $this->description = $this->l('Développeur web spécialisé Prestashop.');

        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir désinstaller le module ?');
    }

    public function install()
    {
        if (!parent::install() || !$this->registerHook('displayBackOfficeHeader')) {
            return false;
        }

        return true;
    }


    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        return true;
    }

    public function hookDisplayBackOfficeHeader($params)
    {
        // Check if the current controller is AdminDashboard
        if ($this->context->controller->controller_name == 'AdminDashboard') {
            // Add CSS
            $this->context->controller->addCSS($this->_path.'views/css/bdweb.css', 'all');

            $this->context->smarty->assign([
                'my_logo_url' => $this->_path . 'logo.png',
                'my_contact_details' => '
                    <h4>Agence BD WEB - Développement Web</h4>
                    → Une question ou une intervention sur votre site ? N\'hésitez pas à nous contacter !
					Horaires d\'ouverture : LU-VE | 9h30 - 12h30 / 14h - 17h30
                    Téléphone : <b>(+33)4.26.11.97.09</b>
                    Mail: <b>contact@bd-web.fr</b>
                    <a href="https://www.bd-web.fr" target="_blank">Visitez notre site web</a>
                '
            ]);

            return $this->display(__FILE__, 'views/templates/hook/displayBackOfficeHeader.tpl');
        }
    }
}
