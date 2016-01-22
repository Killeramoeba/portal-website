<?php


    $codes = array();
    function addCode($code,$hero,$gun,$armor,$trait,$spec,$talent,$key,$moh,$pcc,$cob,$lsa,$rem,$titles){
        global $codes;
        $element = array();
        $element[0]= $code;
        $element[1]= $hero;
        $element[2]= $gun;
        $element[3]= $armor;
        $element[4]= $trait;
        $element[5]= $spec;
        $element[6]= $talent;
        $element[7]= $key;
        $element[8]= $moh;
        $element[9]= $pcc;
        $element[10]= $cob;
        $element[11]= $lsa;
        $element[12]= $rem;
        $element[13]= $titles;
        array_push($codes, $element);
    }

    function WriteHero($name, $code, $rank, $diff, $hero, $gun, $armor, $trait, $spec, $talent, $key, $moh, $pcc, $cob, $lsa, $rem, $titles, $heroname) {
        addCode($code,$hero,$gun,$armor,$trait,$spec,$talent,$key,$moh,$pcc,$cob,$lsa,$rem,$titles);
    }



    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://night.org/swat2/playerdb/?user=".$_COOKIE['energyisforwimps-rcpdUsername']."&pw=".$_COOKIE['energyisforwimps-rcpdPassword']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $pos1 = strpos($output, "WriteHero(");
    $pos2 = strrpos($output, "WriteHero(")+94;
    $output = substr($output, $pos1, $pos2-$pos1 );
    eval ($output);
    echo json_encode($codes);
?>

