<?php

    try {
        $db = new PDO("mysql:host=localhost; dbname=benimsitem", "root", "");       
        $db -> query("SET CHARSET UTF8");
    } catch (PDOException $a) {
        die("Hata: ".$a->getMessage());
    }

?>