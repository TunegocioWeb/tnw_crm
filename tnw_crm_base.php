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

        add_action( 'admin_menu', array($this,'add_admin_menu'));//hook para hacer addons
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
}

new Crm_tnw();