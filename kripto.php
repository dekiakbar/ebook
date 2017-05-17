<?php

define('BASE_PATH', 'http://localhost/ebook/');

function encryptor($aksi, $url) {
    $output = false;
    $method = "AES-256-CBC";
    $kunci = 'hmtinusaputra';
    $secret_iv = 'informaticengineering';

    $key = hash('sha256', $kunci);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $aksi == 'encrypt' ) {
        $output = openssl_encrypt($url, $method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $aksi == 'decrypt' ){
    	$output = openssl_decrypt(base64_decode($url), $method, $key, 0, $iv);
    }

    return $output;
}

function konversi($bytes, $decimals = 2) {
    $faktor = floor((strlen($bytes) - 1) / 3);
    if ($faktor > 0) $sz = 'KMGT';
    return sprintf("%.{$decimals}f", $bytes / pow(1000, $faktor)) . @$sz[$faktor - 1] . 'B';
}