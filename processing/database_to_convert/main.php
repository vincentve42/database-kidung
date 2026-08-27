<?php 
require_once __DIR__ . "/../object/kidung.php";

class Database{
    public $database;
    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=kidung', "root", "");
    }
    public function query($str)
    {
        
        return $this->database->query($str);
    }
    public function insertKidung($kidungArr){
        $this->query("TRUNCATE TABLE kidung");
        foreach($kidungArr as $eachKidung)
        {
            
            $query = $this->database->prepare("INSERT INTO kidung(no_kidung, judul, isi) VALUES(?, ?, ?)");
            $query->bindParam(1, $eachKidung->no_kidung, PDO::PARAM_INT);
            $query->bindParam(2,$eachKidung->judul, PDO::PARAM_STR);
            $query->bindParam(3,$eachKidung->isi, PDO::PARAM_STR);
            $query->execute();
            
        }
    }
}

?>