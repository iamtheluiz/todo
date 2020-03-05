<?php

/**
 * @var $v
 * @var string $error
 */
$v->layout("_theme");
?>

<?php $v->start("header"); ?>
<link rel="stylesheet" href="<?= url("/source/error/style.css"); ?>">
<?php $v->end(); ?>

<h1>Erro <?= $error ?></h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, ut!</p>
<a href="<?= url(""); ?>">Voltar</a>