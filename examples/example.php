<?php
require_once __DIR__ .'/../vendor/autoload.php';

use defrindr\katatanggal\katatanggal;

$tanggal = new katatanggal("19-05-2002");
echo $tanggal->get();

// $tanggal = new katatanggal("29-05-2008");
// echo $tanggal->get();

// $tanggal = new katatanggal("18-02-2007");
// echo $tanggal->get();

// $tanggal = new katatanggal("21-08-2012");
// echo $tanggal->get();

// $tanggal = new katatanggal("12-12-2012");
// echo $tanggal->get();

// $tanggal = new katatanggal("03-11-2022");
// echo $tanggal->get();

// $tanggal = new katatanggal("03-05-2020");
// echo $tanggal->get();

// $tanggal = new katatanggal("20-04-2100");
// echo $tanggal->get();

// $tanggal = new katatanggal("29-35-4002");
// echo $tanggal->get();
