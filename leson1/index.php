<?php
require "functions.php";
$tasks = get_all();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>to.do</title>
</head>
<body>
    <header class="page-header">
        <div class="page-header-container">
            <h1>to.do</h1>
        </div>
    </header>
    <div class="page-content">
        <div class="page-content-container">
            <form action="save.php" method="POST">
                <div class="input-container">
                    <input
                        type="text"
                        name="task"
                        maxlength="200"
                        class="input-text"
                        placeholder="Nova tarefa">
                    <button type="submit" class="btn-submit">do</button>
                </div>
            </form>
            <table>
                <tbody>

                <?php

                foreach ($tasks as $task):

                    ?>

                    <tr>
                        <td width="2.2rem">
                            <form action = "update.php" method="post" id="<?php echo ('form-'. $task[0]) ?>" >
                                <input <?php if(intval($task[2])) echo 'checked';?>
                                onclick="taskMark(this)"
                                type="checkbox"
                                value="<?= $task[0]?>"
                                >
                                <input type="hidden" name="id" value="<?= $task[0] ?>">

                            </form>

                        </td>
                        <td class="td-not-done">
                            <?php
                            if (intval($task[2])) {
                                echo "<s>$task[1]</s>";
                            }else{
                                echo $task[1];
                            }
                            ?>
                        </td>

                        <td width="2.2rem">
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $task[0] ?>">
                                <button type="submit" class="link-trash" id="trash">
                                    <span class="material-icons-outlined">delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php endforeach ?>

                </tbody>
            </table>
            <script>
                function taskMark(cb) {
                    formID = 'form-' + cb.value
                    form = document.getElementById(formID)
                    form.submit()
                }

            </script>

        </div>
    </div>
</body>
</html>

