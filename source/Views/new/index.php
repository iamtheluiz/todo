<?php

/**
 * @var $v
 */
$v->layout("_theme");
?>

<?php $v->start("header"); ?>
<link rel="stylesheet" href="<?= url("/source/new/style.css"); ?>">
<?php $v->end(); ?>

<form action="<?= url("new/"); ?>" method="post">
    <h1>New To Do</h1>
    <input type="text" name="nm_todo" placeholder="Nome..." required>
    <textarea name="ds_todo" placeholder="Descrição..." rows="3"></textarea>
    <button type="submit" class="button">Enviar</button>
    <a href="<?= url(""); ?>" class="button">Voltar</a>
</form>
