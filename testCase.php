<?php
use PHPUnit\Framework\TestCase as TC;
use defrindr\katatanggal\katatanggal;

class testCase extends TC {
    function testKataTanggal_1_get_day() {
        $word = new katatanggal("15-07-2020");
        $this->assertEquals($word->getDay(), 'Hari Rabu');
    }
    function testKataTanggal_2_get_day() {
        $word = new katatanggal("15-07-2020");
        $this->assertEquals($word->getDate(), 'Tanggal Lima Belas');
    }
    function testKataTanggal_3_get_day() {
        $word = new katatanggal("15-07-2020");
        $this->assertEquals($word->getMonth(), 'Bulan Tujuh');
    }
    function testKataTanggal_4_get_day() {
        $word = new katatanggal("15-07-2020");
        $this->assertEquals($word->getYear(), 'Tahun Dua Ribu Dua Puluh');
    }
    function testKataTanggal_5_get_day() {
        $word = new katatanggal("15-07-2020");
        $this->assertEquals($word->get(), 'Hari Rabu, Tanggal Lima Belas Bulan Tujuh Tahun Dua Ribu Dua Puluh');
    }
    function testKataTanggal_6_get_day() {
        $word = new katatanggal("1-07-2100");
        $this->assertEquals($word->getYear($withPrefix = false), 'Dua Ribu Seratus');
    }
    function testKataTanggal_7_get_day() {
        $word = new katatanggal("1-07-2100");
        $this->assertEquals($word->getDate($withPrefix = false), 'Satu');
    }
    function testKataTanggal_8_get_day() {
        $word = new katatanggal("1-07-2100");
        $this->assertEquals($word->getMonth($withPrefix = false), 'Tujuh');
    }
    function testKataTanggal_9_get_day() {
        $word = new katatanggal("15-07-2020");
        $this->assertEquals($word->getDay($withPrefix = false), 'Rabu');
    }
    function testKataTanggal_10_get_day() {
        $this->expectException(Exception::class);
        $word = new katatanggal("55-07-2020");
    }
}