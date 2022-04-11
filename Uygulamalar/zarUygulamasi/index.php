<?php

    $zar1 = rand(1, 6);
    $zar2 = rand(1, 6);

    echo $zar1."<br>";
    echo $zar2."<br>";

    $array = array(
        "https://1.bp.blogspot.com/-L61RKJ94Wcg/Xpg4z1k-_aI/AAAAAAAAKvg/hGrZvJlOP4QUNDKYAF8Mjs7OAP7pCfg1ACNcBGAsYHQ/s200/zar1.png",
        "https://1.bp.blogspot.com/-DwMVIPYvthw/Xpg547hz7nI/AAAAAAAAKv0/qwaEcefdXqAtN-dWS_HAlpRT2d8HPt83gCNcBGAsYHQ/s200/zar2.png",
        "https://1.bp.blogspot.com/-iTzF7GTURFY/Xpg54p-WbLI/AAAAAAAAKvs/FZy8roRNkO0ANPKoNdxLrjQv2Y-cBYqRACNcBGAsYHQ/s200/zar3.png",
        "https://1.bp.blogspot.com/-Qm8Z-kUyjjU/Xpg541tE5UI/AAAAAAAAKvw/FP5W_LREYoo0tg5Jz7kE1pK9bEM6nqTZACNcBGAsYHQ/s200/zar4.png",
        "https://1.bp.blogspot.com/-S57QyxGfbMo/Xpg55SLbY5I/AAAAAAAAKv4/lg1TvFMRXtoVnwo8wR2zHfK1FvIRLaTDwCNcBGAsYHQ/s200/zar5.png",
        "https://1.bp.blogspot.com/-pJee7zELvEQ/Xpg55uWlilI/AAAAAAAAKv8/eHQ8f3HXwFY63S8Z8qtVI9VM73pzPq_8QCNcBGAsYHQ/s200/zar6.png"
    ); 

    

    if (@$_POST["yenile"] == false) {
        echo '<img src="'.$array[$zar1-1].'">'."<br>";
        echo '<img src="'.$array[$zar2-1].'">';
    }else {
        echo "Başarısız";
    }

?>


<form action="" method="POST">
    <button name="yenile"> Yenile </button>
</form>