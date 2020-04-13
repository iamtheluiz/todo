<input
    type="checkbox"
    id="<?= $item->cd_todo; ?>"
    <?= $item->st_todo == 1 ? "checked" : ""; ?>
    data-id="<?= $item->cd_todo; ?>"
    data-action="<?= $router->route("todo.update"); ?>"
    data-method="PUT"
    data-status="<?= $item->st_todo; ?>"
>
<label for="<?= $item->cd_todo; ?>"><?= $item->nm_todo; ?></label>
<a href="<?= $router->route("todo.details", ["id" => $item->cd_todo]); ?>" class="emoji">ℹ</a>
<?php if ($item->st_todo == 1): ?>
    <a
        href="#!"
        class="emoji"
        data-action="<?= $router->route("todo.delete") ?>"
        data-id="<?= $item->cd_todo; ?>"
        data-method="DELETE"
    >
        🗑
    </a>
<?php else: ?>
    <a href="<?= $router->route("todo.edit", ["id" => $item->cd_todo]); ?>" class="emoji">✏</a>
<?php endif; ?>
