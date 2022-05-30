<?php

Router::get('/',function () {
    return view('index');
});

Router::get('/about',function () {

    $pdo = DbConnector::make();

    $sql = "SELECT * FROM tasks;";
    $statement = $pdo->query($sql);

    $tasks = $statement->fetchAll(PDO::FETCH_CLASS);

    return view('about', [
        'tasks' => $tasks
    ]);
});

Router::post('/about', function () {
    //conexão com o banco
    $pdo = DbConnector::make();

    //criar uma instrução SQL para inserir o dado no banco
    $sql = "INSERT INTO tasks ('task') VALUES (?)";
    $statement = $pdo->prepare($sql);
    $statement->execute([$_POST['task']]);
    Redirect::to('/about');
});
