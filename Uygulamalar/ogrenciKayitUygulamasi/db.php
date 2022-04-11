<?php 

    class DB {
        var $server = "localhost";
        var $user = "root";
        var $password = "";
        var $dbname = "ogrenci_kayit_uygulamasi";
        var $baglanti;

        function __construct() {
            try { 
                $this -> baglanti = new PDO("mysql:host=".$this->server.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->password);
            }catch(PDOException $error) {
                echo $error -> getMessage();
                exit();
            }
        }

        /*Select * From tablo Where id=2 Order by ASC Limit 1*/ 
        public function listele($tablo, $where, $whereArray, $orderBy, $limit) {
            $this -> baglanti -> query("SET CHARACTER SET utf8");
            $sql = "SELECT * FROM ".$tablo; //Select * From tablo
            if (!isset($where) && !isset($whereArray)) { //Select * From tablo where id=2 
                $sql = " ".$where;
                if (!isset($orderBy)) {
                    $sql = " LIMIT ".$orderBy; //Select * From tablo where id=2 Order by ASC
                }
                if (!isset($limit)) {
                    $sql = " ".$limit; //Select * From tablo where id=2 Order by ASC limit 1
                }
                $sqlPrepare = $this -> baglanti -> prepare($sql);
                $sqlExecute = $sqlPrepare -> execute($whereArray);
                $sqlSonuc = $sqlPrepare -> fetch(PDO::FETCH_ASSOC); 
            }else {
                if (!isset($orderBy)) {
                    $sql = " LIMIT ".$orderBy; //Select * From tablo where id=2 Order by ASC
                }
                if (!isset($limit)) {
                    $sql = " ".$limit; //Select * From tablo where id=2 Order by ASC limit 1
                }
                $sqlSonuc = $this -> baglanti -> query($sql, PDO::FETCH_ASSOC);
            }
            return $sqlSonuc;
        }

        public function say($tablo) {
            $this -> baglanti -> query("SET CHARACTER SET utf8");
            $sql = "SELECT * FROM ".$tablo;
            $sqlPrepare = $this -> baglanti -> prepare($sql);
            $sqlExecute = $sqlPrepare -> execute();
            $sqlSonuc = $sqlPrepare -> fetch(PDO::FETCH_ASSOC);
            $say = $sqlPrepare -> rowCount();
            return $say;
        }

        // INSERT INTO tablo SET deger1=?, deger2=?;
        public function ekle($tablo, $degerler, $degerlerArray) {
            $this -> baglanti -> query("SET CHARACTER SET utf8");
            $sql = "INSERT INTO ".$tablo." SET ".$degerler;
            $sqlPrepare = $this -> baglanti -> prepare($sql);
            $sqlExecute = $sqlPrepare -> execute($degerlerArray);
            $sqlSonuc = $sqlPrepare -> fetch(PDO::FETCH_ASSOC); 
        }

        

    }
    
?>