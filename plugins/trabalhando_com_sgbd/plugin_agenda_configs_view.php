<div class="conteudo">
    <h1>CRUD Contatos do Menu Plugin</h1><br><br>

    <?php
    if (count($contatos) > 0) {
        echo "<table border='1'>
        <tr>
            <td>Nome</td>
            <td>WhatsApp</td>
        </tr>";

        foreach ($contatos as $contato) {

            echo "
            <tr>
                <td>{$contato->nome}</td>
                <td>{$contato->whatsapp}</td>
            </tr>";
        }
    }

    echo "</table>";

    ?>
    <br><br>

    <form method="POST">

        <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="">
        </div><br>

        <div class="campo">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" name="whatsapp" id="whatsapp" value="">
        </div><br>

        <?php
        submit_button('Gravar Novo');
        ?>
    </form>

</div>