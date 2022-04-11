<?php

    try {
        $db = new PDO("mysql:host=localhost; dbname=paylasinca", "root", "");       
        $db -> query("SET CHARSET UTF8");
    } catch (PDOException $a) {
        die("Hata: ".$a->getMessage());
    }

?>