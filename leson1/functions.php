<?php

require('funcoes_db.php');


function get_all()
{
    return dbRead();
}

function save_task($name)
{
    dbInclude($name);
}

function delete_task($id)
{
    $tempArray = [];
    if ($file = fopen(DB_FILE, 'r+')) {
        while (!feof($file)) {
            $row = fgets($file);
            $fields = explode(",", $row);
            if (count($fields) == 3 && ($id != intval($fields[0]))) {
                $tempArray[] = $fields;
            }
        }
        fclose($file);
    }
    dbRewrite($tempArray);
}

function update_task($id)
{
    $tempArray = [];
    if ($file = fopen(DB_FILE, 'r+')) {
        while (!feof($file)) {
            $row = fgets($file);
            $fields = explode(",", $row);
            if (count($fields) == 3 && ($id == intval($fields[0]))) {
                $fields[2] = ! intval($fields[2]). PHP_EOL;
            }
            $tempArray[] = $fields;
        }
        fclose($file);
    }
    dbRewrite($tempArray);
}






