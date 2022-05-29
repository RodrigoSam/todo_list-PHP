<?php
require "functions.php";

$task = $_POST["id"];
delete_task($task);

header("Location: index.php");