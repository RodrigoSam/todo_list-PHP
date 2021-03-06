<?php
namespace App\Database\Seeders;

use PDO;

class UsersTableSeeder
{
    public static function populate(PDO $pdo)
    {
        $statement = $pdo->prepare("INSERT INTO users ('name', 'email') VALUES (?,?)");
        $statement->execute(["Jorge", "jorge@test.com"]);
        $statement->execute(["Rodrigo", "rodrigo@teste.com"]);
    }
}