<?php
require "functions.php";

$task = $_POST["id"];
update_task($task);

header("Location: index.php");