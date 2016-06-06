<?php
/**
* Plugin Name: tnw crm base
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
        $this->define_constants();
        register_activation_hook( __FILE__, array($this,'installation') );

        add_action( 'admin_menu', array($this,'add_admin_menu'));
    }

    function define_constants()
    {
        global $wpdb;
        define( 'TNW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        define( 'TNW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        define( 'WPSP_VERSION', '6.1.9' );

        define('TNW_CRM_SUBSCRIBERS', $wpdb->prefix.'tnw_crm_subscribers' );
    }

    function installation(){
        include_once( TNW_PLUGIN_DIR.'includes/admin/installation.php' );
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
        echo "hola mundo";
    }

    function pre_footer() {
        do_action('pre_footer');
    }
}

new Crm_tnw();
?>