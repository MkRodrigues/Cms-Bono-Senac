<div class="wrap">
    <h1>Configurações do Plugin Exemplo de Menu</h1><br><br>

    <form method="POST" action="options.php">
        <?php
        settings_fields('configs-plugin-poo');
        do_settings_sections('configs-plugin-menu');
        ?>

        <label for="url-api-auth">URL Authentication</label>
        <input type="text" name="url-api-auth-poo" id="url-api-auth-poo" value="<?php echo get_option('url-api-auth-poo') ?>"><br><br>

        <label for="url-api-endpoint1">URL End Point 1</label>
        <input type="text" name="url-api-endpoint1-poo" id="url-api-endpoint1-poo" value="<?php echo get_option('url-api-endpoint1-poo') ?>"><br><br>

        <label for="url-api-token">Token da API</label>
        <input type="text" name="url-api-token-poo" id="url-api-token-poo" value="<?php echo get_option('url-api-token-poo') ?>"><br><br>

        <?php
        submit_button()
        ?>
    </form>
</div>