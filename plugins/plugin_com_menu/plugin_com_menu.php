<?php
/* 
* Plugin Name: Menu do Admin
* Plugin URI: https://sp.senac.br
* Description: Exemplo de como trabalhar com Menu do Admin
* Version: 0.0.1
* Author: Mikael Assis
* Author URI: https://google.com
* Licence: CC BY 
*/

add_action('admin_init', 'configs_do_plugin_menu');

function configs_do_plugin_menu()
{
    register_setting('configs-plugin-menu', 'url-api-auth');
    register_setting('configs-plugin-menu', 'url-api-endpoint1');
    register_setting('configs-plugin-menu', 'url-api-token');
}


add_action('admin_menu', 'gera_item_no_menu');

function gera_item_no_menu()
{
    //Para criar um item de Menu na Sidebar do Worpdress
    //add_menu_page('Configurações do Plugin Menu', 'Config Plugin Menu', 'administrator', 'Config Plugin Menu', 'abre_config_plugin_menu', 'dashicons-airplane');

    //Para criar um sub-item em um menu existente da Sidebar padrão Wordpress
    add_submenu_page('options-general.php', 'Configurações do Plugin Menu', 'Config Plugin Menu', 'administrator', 'config-plugin-menu', 'abre_config_plugin_menu', 2);
}

function abre_config_plugin_menu()
{
    require 'plugin_menu_configs_view.php';
}
