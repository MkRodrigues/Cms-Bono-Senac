<div class="conteudo">
    <h1>CRUD Contatos do Menu Plugin</h1><br><br>

    <?php

    if (isset($msg)) {
        echo "<font color='green'>$msg</font><br><br>";
    }

    if (isset($erro)) {
        echo "<font color='red'>$erro</font><br><br>";
    }

    if (count($contatos) > 0) {
        echo "<table border='1'>
        <tr>
            <td>Nome</td>
            <td>WhatsApp</td>
            <td>Ações</td>
        </tr>";

        foreach ($contatos as $contato) {

            echo "
            <tr>
                <td>{$contato->nome}</td>
                <td>{$contato->whatsapp}</td>
                <td>
                    <a href='?page={$_GET['page']}&editar={$contato->id}'>Editar</a>
                    <a href='?page={$_GET['page']}&apagar={$contato->id}'>Excluir</a>
                </td>

            </tr>
            ";
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