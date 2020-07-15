<?php
namespace defrindr\katatanggal;

class Replace
{
    const arr = ["Hari", "Tanggal", "Bulan", "Tahun"];
    public static function day($word)
    {
        return trim(str_replace("Hari", "", $word));
    }
    public static function month($word)
    {
        return trim(str_replace("Bulan", "", $word));
    }
    public static function date($word)
    {
        return trim(str_replace("Tanggal", "", $word));
    }
    public static function year($word)
    {
        return trim(str_replace("Tahun", "", $word));
    }
    public static function All($word)
    {
        foreach (self::arr as $replaceWord) {
            $word = str_replace($replaceWord, "", $word);
        }

        return trim($word);
    }
}
