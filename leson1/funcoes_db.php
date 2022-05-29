<?php
const DB_FILE = 'db.txt';
//função fopen: Abre um arquivo ou URL
//função fgets: Lê uma linha de um ponteiro de arquivo

function dbRead()
{
    $file = fopen(DB_FILE, 'r');

    $tasks = array();

    if ($file) {
//função feof() =>Testa pelo fim-do-arquivo em um ponteiro de arquivo.retorna um true se o ponteiro estiver no fim de um arquivo
//por isso foi feita a negação, fazendo com que o feof retorne false, quando ele retornar true sai do looping.
        while (!feof($file)) {
            $line = trim(fgets($file));
            $fields = explode(",",$line);
            if (count($fields) == 3) {
                $tasks[] = $fields;
            }
        }
        fclose($file);
    }
    return $tasks;

}

function dbInclude($task)
{
    if ($file = fopen(DB_FILE, 'a')) {

        $newRow = implode(",", [getNextId(), $task, 0]);
        fwrite($file, $newRow . PHP_EOL);
        fclose($file);

    }

}

function getNextId()
{
    if ($file = fopen(DB_FILE, 'r+')) {
        $nextId = 1;
        while (!feof($file)) {
            $row = fgets($file);
            $fields = explode(",", $row);
            if (!empty($fields[0])) {
                $nextId = intval($fields[0]) + 1;
            }
        }
        fclose($file);
        return $nextId;
    }

}

// delete
// post -> id do registro a ser a ser deletado
// abrir o arquivo
// percorrer a linha comparando o id da linha com id do post
// se a linha não corresponder ao id do post , armazenar ela num array temporario para gravar futuramente de volta no db
// se a linha corresponder tu ignora ela e continua ate o final do arquivo
// rebrir o arquivo em modo escrita (w) e não append (a) // zerar ... e iniciar tudo de novo
// percorrer o array temporario e escrever cada item desse array no arquivo db

    function dbRewrite(array $data)
    {
       if ($file = fopen(DB_FILE,'w')) {
           foreach ($data as $taskArr) {
               $newRow = implode(",",$taskArr);
               fputs($file, $newRow);
           }
           fclose($file);
       }



}


?>
