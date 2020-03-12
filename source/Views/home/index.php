<?php

/**
 * @var $v
 * @var \Source\Models\Todo $todos
 * @var string $date
 */
$v->layout("_theme");
?>

    <header><?= $date ?></header>

    <h1>To do List</h1>

    <div class="todos">
        <?php
        if ($todos): ?>
            <ul>
                <?php foreach ($todos as $item): ?>
                    <li>
                        <input
                            type="checkbox"
                            id="<?= $item->cd_todo; ?>"
                            <?= $item->st_todo == 1 ? "checked" : ""; ?>
                            data-action="<?= $router->route("todo.update"); ?>"
                            data-status="<?= $item->st_todo; ?>"
                        >
                        <label for="<?= $item->cd_todo; ?>"><?= $item->nm_todo; ?></label>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h2>Não existem tarefas cadastradas!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ratione!</p>
        <?php endif; ?>
    </div>

    <a class="button" href="<?= $router->route("todo.new"); ?>">Cadastrar</a>

<?php $v->start("scripts"); ?>
    <script>
        $(function () {
            $("body").on("click", "[data-action]", function (event) {
                let data = $(this).data();
                let li = $(this).parent();


            });
        })
    </script>
<?php $v->end();
