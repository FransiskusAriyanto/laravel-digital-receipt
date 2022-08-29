<?php
function Convert($nominal){
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $hasil = "";
    if($nominal <12){
        $hasil = " ". $huruf[$nominal];
    } else if($nominal < 20 ){
        $hasil = Convert($nominal - 10). " belas";
    } else if($nominal < 100){
        $hasil = Convert($nominal / 10). " puluh". Convert($nominal % 10);
    } else if($nominal < 200){
        $hasil = " seratus" . Convert($nominal - 100);
    } else if($nominal < 1000){
        $hasil = Convert($nominal/100) . " ratus" . Convert($nominal % 100);
    } else if($nominal < 2000){
        $hasil = " seribu" . Convert($nominal - 1000);
    } else if ($nominal < 1000000) {
        $hasil = Convert($nominal/1000) . " ribu" . Convert($nominal % 1000);
    } else if ($nominal < 1000000000) {
        $hasil = Convert($nominal/1000000) . " juta" . Convert($nominal % 1000000);
    } else if ($nominal < 1000000000000) {
        $hasil = Convert($nominal/1000000000) . " milyar" . Convert(fmod($nominal,1000000000));
    } else if ($nominal < 1000000000000000) {
        $hasil = Convert($nominal/1000000000000) . " trilyun" . Convert(fmod($nominal,1000000000000));
    }
    return $hasil;
}
function Bulan($bulan) {
    switch ($bulan) {
        case '01':
            return 'Januari';
        case '02':
            return 'Februari';
        case '03':
            return 'Maret';
        case '04':
            return 'April';
        case '05':
            return 'Mei';
        case '06':
            return 'Juni';
        case '07':
            return 'Juli';
        case '08':
            return 'Agustus';
        case '09':
            return 'September';
        case '10':
            return 'Oktober';
        case '11':
            return 'November';
        case '12':
            return 'Desember';
    }
}
function Enkripsi($request){
    $p1 = mt_rand(2,1000);
    $q1 = mt_rand(2,1000);

    $p = gmp_nextprime($p1);
    $q = gmp_nextprime($q1);

    $n = gmp_mul($p,$q);


    $phin = gmp_mul(gmp_sub($p,1), gmp_sub($q,1));

    for($e=2;$e<100;$e++){

        $gcd = gmp_gcd($e, $phin);

        if(gmp_strval($gcd) == '1')

            break;

    }

    $i = 1;

    do{

        $res = gmp_div_qr(gmp_add(gmp_mul($phin,$i),1), $e);

        $i++;

        if($i == 10000)

            break;

    }while(gmp_strval($res[1])!='0');

    $d = $res[0];

    $d = gmp_strval($d);
    $e = gmp_strval($e);
    $n = gmp_strval($n);
    
    for($i = 0; $i < strlen($request); $i++){
        $cipher = gmp_strval(gmp_mod(gmp_pow(ord($request[$i]), $e), $n));
  
        if($i != strlen($request)){
            $cipher.="";
            echo $cipher;
        }
    }
}

?>