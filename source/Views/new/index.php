<?php

/**
 * @var $v
 */
$v->layout("_theme");
?>

<?php $v->start("header"); ?>
<link rel="stylesheet" href="<?= url("/source/new/style.css"); ?>">
<?php $v->end(); ?>

<form action="<?= $router->route("todo.store"); ?>" method="post">
    <h1>New To Do</h1>
    <input type="text" name="nm_todo" placeholder="Nome..." required autocomplete="off">
    <textarea name="ds_todo"></textarea>
    <button type="submit" class="button">Enviar</button>
    <a href="<?= $router->route("todo.home"); ?>" class="button grey">Voltar</a>
</form>

<?php $v->start("scripts") ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script>
        // Start editor
        ClassicEditor
            .create( document.querySelector('textarea'))
            .catch( error => {
                console.error( error );
            });
    </script>
<?php $v->end(); ?>
