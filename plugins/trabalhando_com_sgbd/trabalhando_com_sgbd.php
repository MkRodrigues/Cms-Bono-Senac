<?php
/* 
* Plugin Name: Trabalhando com SGBD
* Plugin URI: https://senasp.br
* Description: Exemplo de como lidar com SGBD no WP
* Version: 0.0.1
* Author: Mikael Assis
* Author URI: https://google.com
* Licence: CC BY 
*/

// Cria tabela no Banco 
register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela()
{
    global $wpdb;
    $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, whatsapp BIGINT UNSIGNED NOT NULL)");
}


// Cria opção de Menu

add_action('admin_menu', 'gera_item_no_menu');

function gera_item_no_menu()
{

    add_menu_page('Configurações do Plugin SGBD', 'Config Plugin SGBD', 'administrator', 'Config Plugin SGBD', 'abre_config_plugin_agenda', 'dashicons-airplane');
}

function abre_config_plugin_agenda()
{
    global $wpdb;

    if (isset($_POST['nome']) && isset($_POST['whatsapp'])) {

        $wpdb->query("INSERT INTO {$wpdb->prefix}agenda
                        (nome, whatsapp) 
                    VALUES 
                        ('{$_POST['nome']}', {$_POST['whatsapp']})");
    }

    $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");

    require 'plugin_agenda_configs_view.php';
}

// Quando desativa o Plugin apaga as tabelas
register_deactivation_hook(__FILE__, 'destruir_tabela');

function destruir_tabela()
{
    global $wpdb;
    $wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}
