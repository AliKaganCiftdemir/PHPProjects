<?php 

    Interface IMovie {
        //Select * From tabloadi WHERE id = ? ORDER BY ASC LIMIT 1; 
        public function select($tabloAdi, $where, $whereArray, $orderBy, $limit);

        //SELECT * FROM tabloadi;
        public function selectCount($tabloAdi);
        
        //INSERT INTO tabloadi SET id = ?, id2 = ?;
        public function insert($tabloAdi, $set, $setArray);

        //UPDATE tabloadi SET a = ?, b = ? WHERE id = ?
        public function update($tabloAdi, $set, $setArray, $where, $setWhereArray);

        //DELETE FROM tabloadi WHERE id = 1;
        public function delete($tabloAdi, $where, $whereArray);
    }



?>