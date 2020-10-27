<?php
/* 
* Plugin Name: HTML Booster
* Plugin URI: https://sp.senac.br
* Description: Plugin para configurar o HTML de suas páginas
* Version: 0.0.1
* Author: Mikael Assis
* Author URI: https://google.com
* Licence: CC BY 
*/

// Adiciona Item de Menu na Aba Configurações - Sidebar Wordpress
add_action('admin_menu', 'gera_itens_menu');

function gera_itens_menu()
{
    add_submenu_page('options-general.php', 'Configurações HTML Booster', 'Configurações HTML Booster', 'administrator', 'config-html-booster', 'open_config_html_booster', 3);
}

function open_config_html_booster()
{
    require 'config_html_booster_view.php';
}

// Adiciona itens no página Criada
add_action('admin_init', 'config_html_booster');

function config_html_booster()
{
    register_setting('config_booster', 'page-name');
    register_setting('config_booster', 'page-slug');
    register_setting('config_booster', 'page-title');
}
