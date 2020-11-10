<?php
/* 
* Plugin Name: Menu do Admin em POO
* Plugin URI: https://sp.senac.br
* Description: Exemplo de como criar Plugin POO
* Version: 0.0.1
* Author: Mikael Assis
* Author URI: https://google.com
* Licence: CC BY 
*/

if (!defined('WPINC')) {
    die;
}

class PluginPoo
{

    function __construct()
    {
        add_action('admin_init', array($this, 'configs_do_plugin_menu'));
        add_action('admin_menu', array($this, 'gera_item_no_menu'));
    }

    function configs_do_plugin_menu()
    {
        register_setting('configs-plugin-poo', 'url-api-auth-poo');
        register_setting('configs-plugin-poo', 'url-api-endpoint1-poo');
        register_setting('configs-plugin-poo', 'url-api-token-poo');
    }

    function gera_item_no_menu()
    {
        // Para criar um item de Menu na Sidebar do Worpdress
        add_menu_page('Configurações do Plugin Poo', 'Config Plugin Poo', 'administrator', 'Config Plugin Poo', array($this, 'abre_config_plugin_menu'), 'dashicons-airplane');
    }

    function abre_config_plugin_menu()
    {
        require 'plugin_poo_configs_view.php';
    }
}

new PluginPoo;
