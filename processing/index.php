<?php 

require_once __DIR__ . '/sqlite/main.php';
require_once __DIR__ . '/database_to_convert/main.php';
$database = new SqliteDatabase();

$result = $database->fetchAll(0);

$database_to_convert = new Database();

$database_to_convert->insertKidung($result);
?>