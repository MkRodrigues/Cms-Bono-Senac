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

if (!defined('WPINC')) {
    die;
}

// Cria tabela no Banco 
register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela()
{
    global $wpdb;
    $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, whatsapp BIGINT UNSIGNED NOT NULL)");

    $page_title = 'Contatos';
    $page_name = 'Contatos da Agenda';

    $page = get_page_by_title($page_title);

    if (!$page) {

        $post = [
            'post_title' => $page_title,
            'post_content' => '[tela_dinamica_contatos]',
            'post_status' => 'publish',
            'post_type' => 'page',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_category' => [1]
        ];

        $page_id = wp_insert_post($post);
    } else {

        // $page_id = $page->ID;
        $page->post_status = 'publish';
        $page->post_content = '[tela_dinamica_contatos]';
    }
}


// Cria opção de Menu

// Cria ShortCode
add_shortcode('tela_dinamica_contatos', 'tela_dinamica');

function tela_dinamica()
{
    global $wpdb;

    // Implementa busca na página do usuário
    if (isset($_GET['buscar']) && !empty($_GET['termo'])) {

        $parametro_busca = "%{$_GET['termo']}%";
        $contatos = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}agenda WHERE nome LIKE %s", $parametro_busca));
    } else {
        $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");
    }

    ob_start();

    include 'tela_externa_crud.php';

    return ob_get_clean();
}

add_action('admin_menu', 'gera_item_no_menu');

function gera_item_no_menu()
{

    add_menu_page('Configurações do Plugin SGBD', 'Config Plugin SGBD', 'administrator', 'Config Plugin SGBD', 'abre_config_plugin_agenda', 'dashicons-airplane');
}

function abre_config_plugin_agenda()
{
    global $wpdb;

    // Formulário de Editar
    if (isset($_GET['editar']) && !isset($_POST['id'])) {

        $id = preg_replace('/\D/', '', $_GET['editar']);
        $contato = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda WHERE id = $id");

        require 'crud_editar_contato.php';
    }

    // Apagar dado no Formulário
    if (isset($_GET['apagar']) && !isset($_POST['nome'])) {

        $id = preg_replace('/\D/', '', $_GET['apagar']);
        if ($wpdb->query("DELETE FROM {$wpdb->prefix}agenda WHERE id = $id")) {
            $msg = 'Contato apagado com Sucesso!';
        } else {
            $erro = 'Erro! Contato não apagado!';
        }
    }

    //Editar dado no Formulário
    if (!isset($_GET['editar']) || isset($_POST['id'])) {

        if (isset($_POST['id'])) {

            if (is_numeric($_POST['id'])) {

                if ($wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}agenda SET nome = %s, whatsapp = %s WHERE id = %d", $_POST['nome'], $_POST['whatsapp'], $_POST['id']))) {

                    $msg = 'Contato atualizado com Sucesso!';
                } else {

                    $erro = 'Erro, contato não atualizado!';
                }
            } else {

                $erro = 'Parâmetro Inválido!';
            }

            // Inserir no Banco
        } elseif (isset($_POST['nome'])  && isset($_POST['whatsapp'])) {

            $wpdb->query("INSERT INTO {$wpdb->prefix}agenda (nome, whatsapp) VALUES ('{$_POST['nome']}', {$_POST['whatsapp']})");
        }

        // Listar Dados
        $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");

        require 'plugin_agenda_configs_view.php';
    }
}


// Quando desativa o Plugin apaga as tabelas
register_deactivation_hook(__FILE__, 'destruir_tabela');

function destruir_tabela()
{
    global $wpdb;
    $wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}
