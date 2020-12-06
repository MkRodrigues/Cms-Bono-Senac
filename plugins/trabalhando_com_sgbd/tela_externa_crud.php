<form action="">
    <input type="text" placeholder="Buscar" name="termo">
    <input type="submit" name="buscar" value="Buscar">
</form>

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
        </tr>
        ";
    }
}
