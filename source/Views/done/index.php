<?php

/**
 * @var $v
 * @var \Source\Models\Todo $todos
 * @var string $date
 */
$v->layout("_theme");
?>

    <header><?= $date ?></header>

    <h1>Done</h1>

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
                            data-id="<?= $item->cd_todo; ?>"
                            data-action="<?= $router->route("todo.update"); ?>"
                            data-status="<?= $item->st_todo; ?>"
                        >
                        <label for="<?= $item->cd_todo; ?>"><?= $item->nm_todo; ?></label>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h2>Não existem tarefas concluídas!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ratione!</p>
        <?php endif; ?>
    </div>

    <a class="button grey" href="<?= $router->route("todo.home"); ?>">Voltar</a>

<?php $v->start("scripts"); ?>
    <script>
        $(function () {
            $("body").on("click", "[data-action]", function (event) {
                let data = $(this).data();  // Task info
                let li = $(this).parent();

                // Disable input
                $(this)[0].setAttribute('disabled', '');

                // Update task status
                $.ajax({url: data.action, method: 'PUT', data, encode: true})
                    .then(function (response) {
                        li.fadeOut(400);
                        setTimeout(() => {
                            li.remove();
                        }, 400);

                        console.log(response);
                    });
            });
        })
    </script>
<?php $v->end();
