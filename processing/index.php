<?php 

require_once __DIR__ . '/sqlite/main.php';
require_once __DIR__ . '/database_to_convert/main.php';
$database = new SqliteDatabase();

$result_kidung = $database->fetchAll(0);

$result_suplemen =$database->fetchAll(1);
// mysql
$database_to_convert = new Database("mysql:host=localhost;dbname=kidung", "root", "");

$database_to_convert->insertKidung($result_kidung);

$database_to_convert->insertSuplemen($result_suplemen);

?>