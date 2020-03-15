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
<a href="<?= $router->route("/view"); ?>">details</a>
<?php if ($item->st_todo == 1): ?>
    <a
        href="#!"
        data-action="<?= $router->route("todo.delete") ?>"
        data-id="<?= $item->cd_todo; ?>"
        data-method="DELETE"
    >
        delete
    </a>
<?php else: ?>
    <a href="<?= $router->route("/view"); ?>">edit</a>
<?php endif; ?>
