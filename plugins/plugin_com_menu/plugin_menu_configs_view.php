<div class="wrap">
    <h1>Configurações do Plugin Exemplo de Menu</h1><br><br>

    <form method="POST" action="options.php">
        <?php
        settings_fields('configs-plugin-menu');
        do_settings_sections('configs-plugin-menu');
        ?>

        <label for="url-api-auth">URL Authentication</label>
        <input type="text" name="url-api-auth" id="url-api-auth" value="<?php echo get_option('url-api-auth') ?>"><br><br>

        <label for="url-api-endpoint1">URL End Point 1</label>
        <input type="text" name="url-api-endpoint1" id="url-api-endpoint1" value="<?php echo get_option('url-api-endpoint1') ?>"><br><br>

        <label for="url-api-token">Token da API</label>
        <input type="text" name="url-api-token" id="url-api-token" value="<?php echo get_option('url-api-token') ?>"><br><br>

        <?php
        submit_button()
        ?>
    </form>
</div>