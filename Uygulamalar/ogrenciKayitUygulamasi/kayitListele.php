<?php

    include "db.php";

    $db = new DB();
    $listele = $db -> listele("kayit", "", "", "","");
    $say = $db -> say("kayit");
?>

<tbody>
    <?php 
        if ($say > 0) {
            foreach ($listele as $liste) {
                echo "
                <tr><hr>
                    Öğrenci No: <td>".$liste['ogrenciNo']."</td><br>
                    Öğrenci Adı: <td>".$liste['ogrenciAdi']."</td><br>
                    Öğrenci Bölümü: <td>".$liste['ogrenciBolumu']."</td><br>
                    Öğrenci Not1: <td>".$liste['ogrenciNot1']."</td><br>
                    Öğrenci Not2: <td>".$liste['ogrenciNot2']."</td><br>
                    Öğrenci Not3: <td>".$liste['ogrenciNot3']."</td><br>
                    Öğrenci Ortalama: <td>".$liste['ortalama']."</td><br>
                </tr>";
            }
        }
    ?>
    
</tbody>
    
