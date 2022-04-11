<?php 
 class DB {
    var $server = "localhost";
    var $user = "root";
    var $password = "";
    var $dbname = "filesupload";
    var $baglanti;

    function __construct() {
        try { 
            $this -> baglanti = new PDO("mysql:host=".$this->server.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->password);
        }catch(PDOException $error) {
            echo $error -> getMessage();
            exit();
        }
    }

    //INSERT INTO tabloadi SET deger1=?, deger2=?; 
    public function ekle($tablo, $degerler, $degerlerArray) {
        $sql = "INSERT INTO ".$tablo." SET ".$degerler;
        $sqlPrepare = $this -> baglanti -> prepare($sql);
        $sqlExecute = $sqlPrepare -> execute($degerlerArray);
    }

    //SELECT * FROM tabloadi WHERE id=?;
    public function listele($tablo, $where, $whereArray) {
        $sql = "SELECT * FROM ".$tablo;
        if (!isset($where) && !isset($whereArray)) {
            $sql .= " ".$where;
            $sqlPrepare = $this -> baglanti -> prepare($sql);
            $sqlExecute = $sqlPrepare -> execute($whereArray);
            $sqlFetch = $sqlPrepare -> fetch(PDO::FETCH_ASSOC);
        }else {
            $sqlFetch = $this -> baglanti -> query($sql, PDO::FETCH_ASSOC);
        }
        return $sqlFetch;
    }


    public function say($tablo) {
        $sql = "SELECT * FROM ".$tablo;
        $sqlPrepare = $this -> baglanti -> prepare($sql);
        $sqlExecute = $sqlPrepare -> execute();
        $sqlFetch = $sqlPrepare -> fetch(PDO::FETCH_ASSOC);
        $say = $sqlPrepare -> rowCount();
        return $say;
    }

}
?>