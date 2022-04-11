<?php 

    include "interface.php";

    class Movie implements IMovie{
        
        private $server   = "localhost";
        private $user     = "root";
        private $password = "";
        private $dbname   = "movie_application";
        private $baglanti;

        function __construct() {
            try { 
                $this -> baglanti = new PDO("mysql:host=".$this->server.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->password);
            }catch(PDOException $error) {
                echo $error -> getMessage();
                exit();
            }
        }

        
        public function select($tabloAdi, $where, $whereArray, $orderBy, $limit) {
            $sql = "SELECT * FROM ".$tabloAdi;
            if (!empty($where) && !empty($whereArray)) {
                $sql       .= " WHERE ".$where;
                if (!empty($orderBy)) {
                    $sql   .= " ".$orderBy;
                }
                if (!empty($limit)) {
                    $sql   .= " ".$limit;
                }
                $sqlPrepare = $this -> baglanti -> prepare($sql);
                $sqlExecute = $sqlPrepare -> execute($whereArray);
                $sqlFetch   = $sqlPrepare -> fetchAll(PDO::FETCH_ASSOC);
            }else {
                if (!empty($orderBy)) {
                    $sql   .= " ".$orderBy;
                }
                if (!empty($limit)) {
                    $sql   .= " ".$limit;
                }
                $sqlPrepare = $this -> baglanti -> prepare($sql);
                $sqlExecute = $sqlPrepare -> execute();
                $sqlFetch   = $sqlPrepare -> fetchAll(PDO::FETCH_ASSOC);
            }
            if ($sqlFetch != false && !empty($sqlFetch)) {
                $data = array();
                foreach ($sqlFetch as $bilgi) {
                    $data[] = $bilgi;
                }
                return $data;
            }else {
                return false;
            }
        }

        public function selectCount($tabloAdi){
            $sql        = "SELECT * FROM ".$tabloAdi;
            $sqlPrepare = $this -> baglanti -> prepare($sql);
            $sqlExecute = $sqlPrepare -> execute();
            $sqlFetch   = $sqlPrepare -> fetchAll(PDO::FETCH_ASSOC);
            $count      = $sqlPrepare -> rowCount();
            return $count;
        }
        
        public function insert($tabloAdi, $set, $setArray){
            $sql        = "INSERT INTO ".$tabloAdi. " SET ".$set;
            $sqlPrepare = $this -> baglanti -> prepare($sql);
            $sqlExecute = $sqlPrepare -> execute($setArray);
            if ($sqlExecute) {
                echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='form.php'</script>";
            }else {
                echo "<script>alert('İşleminiz Başarısı Olmuştur.'); window.location.href='ekle.php'</script>";
            }
        }

        public function update($tabloAdi, $set, $setArray, $where, $setWhereArray){
            $id = $_GET["id"];
            $sql             = "UPDATE ".$tabloAdi." SET ".$set;
            if (!empty($where) && !empty($setWhereArray)) {
                $sql        .= " WHERE " .$where;
                $sqlPrepare  = $this -> baglanti -> prepare($sql);
                $sqlExecute  = $sqlPrepare -> execute($setWhereArray);
            }else {
                echo "abc";
                $sqlPrepare  = $this -> baglanti -> prepare($sql);
                $sqlExecute  = $sqlPrepare -> execute($setArray); 
            }
            if ($sqlExecute) {
                echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='form.php?=$id'</script>";
            }else {
                echo "<script>alert('İşleminiz Başarısız Olmuştur.'); window.location.href='duzenle.php?=$id'</script>";
            }
        }

        public function delete($tabloAdi, $where, $whereArray){
            $id = $_GET["id"];
            $sql             = "DELETE FROM ".$tabloAdi;
            if (!empty($where) && !empty($whereArray)) {
                $sql        .= " WHERE ".$where;
                $sqlPrepare  = $this -> baglanti -> prepare($sql);
                $sqlExecute  = $sqlPrepare -> execute($whereArray);
            }else {
                $sqlPrepare  = $this -> baglanti -> prepare($sql);
                $sqlExecute  = $sqlPrepare -> execute(); 
            }
            if ($sqlExecute) {
                echo "<script>alert('İşleminiz Başarıyla Gerçekleşmiştir.'); window.location.href='form.php?=$id'</script>";
            }else {
                echo "<script>alert('İşleminiz Başarısız Olmuştur.'); window.location.href='form.php?=$id'</script>";
            }
        }
    }

?>