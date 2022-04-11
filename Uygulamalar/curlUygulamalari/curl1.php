<?php 
    function baglan($adres) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $adres);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        $sonuc = curl_exec($curl);
        curl_close($curl);
        return $sonuc;
    } 

    $regex = "#<title>(.*?)</title>#";
    $baglan = baglan("https://www.turkcell.com.tr/dunyalarseninolsun?gclid=CjwKCAjwi6WSBhA-EiwA6Niok0SovlIvwjAHPiFGcoD4B05N5snSc7HWeALggd-1X3c1zv5QDfHaLxoCZOMQAvD_BwE&gclsrc=aw.ds");    

    preg_match($regex, $baglan, $title);

    if (!empty($title)) {
        echo $title[1];    
    }else {
        echo "Herhangi bir title değeri bulunamadı.";
    }

    

?>