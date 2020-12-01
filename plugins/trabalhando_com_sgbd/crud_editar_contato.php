<div class="conteudo">
    <h1>Editar Contato</h1><br><br>

    <?php

    if (isset($msg)) {
        echo "<font color='green'>$msg</font><br><br>";
    }

    if (isset($erro)) {
        echo "<font color='red'>$erro</font><br><br>";
    }
    ?>


    <br><br>
    <form method="POST">

        <input type="hidden" name="$id" value="<?php echo $contato[0]->id; ?>">

        <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $contato[0]->nome; ?>">
        </div><br>

        <div class="campo">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" name="whatsapp" id="whatsapp" value="<?php echo $contato[0]->whatsapp; ?>">
        </div><br>

        <?php
        submit_button('Gravar Novo');
        ?>
    </form>

</div>