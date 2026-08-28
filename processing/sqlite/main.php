<?php

require_once __DIR__ . "/../object/kidung.php";
require_once __DIR__ . "/../object/suplemen.php";
class SqliteDatabase{
    public $database;
    public function __construct()
    {
       $this->database = new SQLite3("kidung.db");
    }
    public function query($str)
    {
        return $this->database->query($str);
    }
    public function fetchAll(int $tipe)
    {
        if($tipe == 0)
        {
            $obj = [];
            $result = $this->query("SELECT * FROM Kidung WHERE tipe='k'");  
            while($row = $result->fetchArray())
            {
                $kidung = new Kidung();
                $content = $row[1];
                $content = explode("\n", $content, 2);
                $kidung->judul = $content[0];
                $kidung->isi = $content[1];
                $kidung->no_kidung = $row[6];
                $obj[] = $kidung;
            }
            return $obj;
        } 
        if($tipe == 1)
        {
            $obj = [];
            $result = $this->query("SELECT * FROM Kidung WHERE tipe='s'");  
            while($row = $result->fetchArray())
            {
                $suplemen = new Suplemen();
                $content = $row[1];
                $content = explode("\n", $content, 2);
                $suplemen->judul = $content[0];
                $suplemen->isi = $content[1];
                $suplemen->no_kidung = (int)$row[6];
                $obj[] = $suplemen;
            }
            return $obj;
        }
    }
}

?>