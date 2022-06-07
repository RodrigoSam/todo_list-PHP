<?php

use App\Database\Migrator;
use App\Database\DbConnector;
use App\database\migrations\CreateTasksTable;
use App\Database\Migrations\CreateUsersTable;

require 'vendor/autoload.php';

Migrator::migrate(DbConnector::make(), new CreateTasksTable());

Migrator::migrate(DbConnector::make(), new CreateUsersTable());


