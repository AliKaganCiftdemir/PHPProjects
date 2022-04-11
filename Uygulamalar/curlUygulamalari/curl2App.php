<?php 

    function baglan($adres) {
        $postVerisi = array(
            "isim"    => "Ali Kağan",
            "soyisim" => "Çiftdemir",
            "mail"    => "alikaganciftdemir@alikagan.com",
            "bilgi"   => "Bu mesaj curl bağlantısı ile gönderilmiştir."
        );  

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $adres);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postVerisi);
        $curlExecute = curl_exec($curl);
        curl_close($curl);
        return $curlExecute;
    }
    
    $baglan = baglan("http://localhost/Uygulamalar/curlUygulamasi/curlForm.php");
    echo $baglan;
?>