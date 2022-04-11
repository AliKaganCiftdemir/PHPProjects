<?php 
    include "db.php";
    
    $db = new DB();
    if (isset($_POST["submit"])) {
        $dosya = $_FILES["dosya1"];        

        $dosyaYolu = $dosya["tmp_name"];
        $dosyaTipi = $dosya["type"];
        $dosyaTipiAl = explode("/",$dosyaTipi);
        $dosyaUzantisi = $dosyaTipiAl[1];
        $dosyaYeniIsim = rand(0,1000).".".$dosyaUzantisi;
        echo $dosyaYeniIsim;
        
        $listele = $db -> listele("files", "", "");
        $say = $db -> say("files");
       
        if ($say > 0) {
            foreach ($listele as $liste) {
                if ($liste["dosyaYeniIsim"] == $dosyaYeniIsim) {
                    echo $liste["dosyaYeniIsim"];
                    $dosyaDegistilmisIisim = "degistirilmis".$dosyaYeniIsim;
                    echo $dosyaDegistilmisIisim;
                    $ekle = $db -> ekle("files", "dosyaYolu = ?, dosyaTipi = ?, dosyaUzantisi = ?, dosyaYeniIsim = ?", array($dosyaYolu, $dosyaTipi, $dosyaUzantisi, $dosyaDegistilmisIisim));
                }else {
                    $ekle = $db -> ekle("files", "dosyaYolu = ?, dosyaTipi = ?, dosyaUzantisi = ?, dosyaYeniIsim = ?", array($dosyaYolu, $dosyaTipi, $dosyaUzantisi, $dosyaYeniIsim));
                    break;
                }     
            }
        }else {
            $ekle = $db -> ekle("files", "dosyaYolu = ?, dosyaTipi = ?, dosyaUzantisi = ?, dosyaYeniIsim = ?", array($dosyaYolu, $dosyaTipi, $dosyaUzantisi, $dosyaYeniIsim));
        }

        $a = $db -> listele("files", "", "");
        foreach ($a as $l) {
            echo "
                <tr><hr>
                    Dosya Yolu: <td>".$l['dosyaYolu']."</td><br>
                    Dosya Tipi: <td>".$l['dosyaTipi']."</td><br>
                    Dosya Uzantısı: <td>".$l['dosyaUzantisi']."</td><br>
                    Dosyanın Yeni İsmi: <td>".$l['dosyaYeniIsim']."</td><br>
                </tr>";
        }
    }
?>