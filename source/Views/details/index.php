<?php

/**
 * @var $v
 */
$v->layout("_theme");
?>

<?php $v->start("header"); ?>
    <link rel="stylesheet" href="<?= url("/source/details/style.css"); ?>">
<?php $v->end(); ?>

    <header>
        <h2 style="color: #4b4b4b"><?= $todo->nm_todo; ?></h2>
        <div class="options">
            <a href="<?= $router->route("todo.edit", ["id" => $todo->cd_todo]); ?>" class="emoji">✏</a>
            <a
                href="#!"
                class="emoji"
                data-action="<?= $router->route("todo.delete") ?>"
                data-id="<?= $todo->cd_todo; ?>"
                data-method="DELETE"
            >
                🗑
            </a>
        </div>
    </header>

    <p><?= $todo->ds_todo; ?></p>

    <a class="button grey" href="<?= $router->route("todo.home"); ?>">Voltar</a>

<?php $v->start("scripts"); ?>
    <script>
        // Document ready
        $(function () {
            $("body").on("click", "[data-action]", function (event) {
                let data = $(this).data();  // Task info
                let li = $(this).parent();

                // Disable input
                $(this)[0].setAttribute('disabled', '');

                // Update task status
                $.ajax({url: data.action, method: data.method, data, encode: true})
                    .then(function (response) {
                        window.location = '/';
                    });
            });
        })
    </script>
<?php $v->end(); ?>