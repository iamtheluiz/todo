<?php
/**
 * @var $v
 * @var string $title
 */

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= url("css/style.css") ?>">
    <?= $v->section("header"); ?>
</head>
<body>
<main>
    <?= $v->section("content"); ?>
</main>

<script src="<?= url("js/jquery.min.js"); ?>"></script>
<?= $v->section("scripts"); ?>
</body>
</html>