<?php
/**
* Plugin Name: tnw_crm
* Plugin URI: https://localhost
* Description: CRM
* Version: 1.0.0
* Author: orionkmc
* Author URI: http://orionkmc.com
* License: GPL2
*/

class Crm_tnw
{
    public function __construct()
    {
        add_action( 'admin_menu', array($this,'add_admin_menu'));
    }

    function add_admin_menu()
    {
        add_menu_page( 
            'TunegocioWeb', //título de la página
            'TunegocioWeb', //título del menú
            'activate_plugins', //capability
            'all', //slug
            array($this, 'all'),
            'dashicons-cloud',
            4
        );

        add_submenu_page(
            'all', //slug padre
            'CRM', //singular
            'CRM <span class="update-plugins count-1"><span class="plugin-count">'. $sql[10][0]->id.'</span></span>', //plural
            'activate_plugins', //capability
            'all', //slug
            array($this, 'all')
        );
    }

    public function all()
    {
        echo "string";
    }
}

new Crm_tnw();