<?php
require "functions.php";

$task = $_POST["task"];
save_task($task);

header("Location: index.php");