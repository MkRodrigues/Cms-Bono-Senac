<div class="conteudo">
    <h1>Configurações HTML Booster</h1>

    <form action="options.php" method="post">

        <?php
        settings_fields('config_booster');
        do_settings_sections('config_booster');
        ?>

        <div class="campo">
            <label for="">Nome da Página</label>
            <input type="text" name="page-name" value="<?php echo get_option('page-name') ?>">
        </div><br>

        <div class="campo">
            <label for="">Slug da Página</label>
            <input type="text" name="page-slug" value="<?php echo get_option('page-slug') ?>">
        </div><br>

        <div class="campo">
            <label for="">Título da Página</label>
            <input type="text" name="page-title" value="<?php echo get_option('page-title') ?>">
        </div><br>

        <?php submit_button(); ?>
    </form>

</div>