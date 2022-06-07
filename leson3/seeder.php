<?php

use App\Database\DbConnector;
use App\Database\Seeders\TasksTableSeeder;
use App\Database\Seeders\UsersTableSeeder;

require 'vendor/autoload.php';

TasksTableSeeder::populate(DbConnector::make());
UsersTableSeeder::populate(DbConnector::make());