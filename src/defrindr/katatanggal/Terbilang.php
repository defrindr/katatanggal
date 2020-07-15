<?php
namespace defrindr\katatanggal;

class Terbilang
{
    public static function get($number)
    {
        $bukansatuan = [
            'Se',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
        ];

        $satuan = [
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
        ];

        $pembagis = [
            "ribu" => 1000,
            "ratus" => 100,
            "puluh" => 10,
            "satuan" => 1,
        ];

        $belasan = [
            "sebelas",
            "dua belas",
            "tiga belas",
            "empat belas",
            "lima belas",
            "enam belas",
            "tujuh belas",
            "delapan belas",
            "sembilan belas",
        ];

        $terbilang = "";
        $sisabagi = 0;
        $return = "";

        foreach ($pembagis as $key => $val) {
            if ($number / $val >= 1) {
                $hasilbagi = $number / $val;
                $sisabagi = $number % $val;
                $number = floor($sisabagi);

                if ($key == "puluh" && $sisabagi != 0) {
                    $return .= ucwords($belasan[$sisabagi - 1]);
                    break;
                } else {
                    if ($key != "satuan") {
                        $word = $bukansatuan[$hasilbagi - 1] . " ";
                        if ($hasilbagi - 1 == 0) {
                            $word = trim($word);
                        }
                        $word .= $key;
                        $return .= ucwords($word) . " ";
                    } else {
                        $word = $bukansatuan[$hasilbagi - 1];
                        if ($hasilbagi - 1 == 0) {
                            $word = "satu";
                        }
                        $return .= ucwords($word) . " ";
                    }
                }

                if ($sisabagi == 0) {
                    break;
                }
            } else {
                continue;
            }
        }

        return trim($return);
    }
}
