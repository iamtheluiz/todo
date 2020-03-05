<?php $v->layout("_theme"); ?>

<header><?= $date; ?></header>

<h1>To do List</h1>

<div class="todos">
    <?php if ($todos): ?>
        <ul>
            <?php foreach ($todos as $item): ?>
                <li>
                    <input type="checkbox" id="<?= $item->cd_todo; ?>" <?= $item->st_todo == 1 ? "checked" : ""; ?>>
                    <label for="<?= $item->cd_todo; ?>"><?= $item->nm_todo; ?></label>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h1>Não existem tarefas cadastradas!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, ratione!</p>
    <?php endif; ?>
</div>

<a href="<?= url("new/"); ?>">Cadastrar</a>