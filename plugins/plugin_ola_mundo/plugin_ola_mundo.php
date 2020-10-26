<?php
/* 
* Plugin Name: Olá Mundo, meu primeiro plugin
* Plugin URI: https://senasp.br
* Description: Um plugin muito simples que apenas coloca Olá Mundo nos posts
* Version: 0.0.1
* Author: Mikael Assis
* Author URI: https://google.com
* Licence: CC BY 
*/


// Exemplo de como utilizar um filter Hook
add_filter('login_errors', 'nova_mensagem_de_erro');

function nova_mensagem_de_erro()
{
    return 'Credenciais Inválidas';
}

// Exemplo de como utilizar um Action Book
add_action('wp_head', 'coloca_comentario');

function coloca_comentario()
{
    if (is_single()) {
        echo '<meta property="og:title" content="' . get_the_title() . '">';
        echo '<meta property="og:site_name" content="' . wp_title('', false) . '">';
        echo '<meta property="og:url" content="' . get_permalink(get_the_ID()) . '">';
    }
}
