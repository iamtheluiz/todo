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
                    <?= $v->insert("components/task", ["item" => $item, "router" => $router]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h2>Não existem tarefas cadastradas!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ratione!</p>
    <?php endif; ?>
</div>

<a class="button" href="<?= $router->route("todo.new"); ?>">Cadastrar</a>
<a class="button grey" href="<?= $router->route("todo.done"); ?>">Concluídas</a>

<?php $v->start("scripts"); ?>
<script>
    $(function () {
        $("body").on("click", "[data-action]", function (event) {
            let data = $(this).data();  // Task info
            let li = $(this).parent();

            // Disable input
            $(this)[0].setAttribute('disabled', '');

            // Update task status
            $.ajax({url: data.action, method: data.method, data, encode: true})
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
<?php $v->end(); ?>
