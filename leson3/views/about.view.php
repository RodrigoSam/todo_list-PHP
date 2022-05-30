<h1>About Page</h1>

<form action="/about" method="post">

    <input type="text" name="task" placeholder="Insira sua tarefa">
    <button type="submit">Salvar</button>
</form>

<hr>

<ul>
    <?php
    foreach ($tasks as $task):
    ?>
    <li><?= $task->task ?></li>
    <?php endforeach; ?>
</ul>
