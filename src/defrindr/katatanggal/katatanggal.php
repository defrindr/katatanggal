<?php
namespace defrindr\katatanggal;


class katatanggal {
    public $result;

    /**
     * @param date $date 
     * format params 'd-m-Y'
     * 
     * 
     */
    public function __construct($date){
        $dates = $this->parseDate($date);
        $day = $dates[0];
        $dates = array_slice($dates,1);

        $day = $this->getDay($day);

        $arr = [];

        foreach($dates as $date){
            array_push($arr,$this->terbilang($date));
        }

        $this->result = "Hari ${day}, Tanggal $arr[0] Bulan $arr[1] Tahun $arr[2]\n";
        return $this;
    }

    public function parseDate($date){
        $arr = explode('-',$date);
        
        if(!checkdate($arr[1],$arr[0],$arr[2])){
            throw new \Exception("Date format not valid");
        }

        $strtotime = strtotime($date);
        $date = date('w-d-m-Y',$strtotime);
        $arr = explode('-',$date);
        return $arr;
    }

    public function get(){
        return $this->result;
    }

    public function getDay($day){
        $days = [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jum'at",
            "Sabtu"
        ];

        return $days[$day];
    }

    public function terbilang($number){
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
            "se belas",
            "dua belas",
            "tiga belas",
            "empat belas",
            "lima belas",
            "enam belas",
            "tujuh belas",
            "delapan belas",
            "sembilan belas"
        ];

        $terbilang = "";
        $sisabagi = 0;
        $return = "";

        foreach($pembagis as $key => $val) {
            if($number / $val >= 1){
                $hasilbagi = $number / $val;
                $sisabagi = $number % $val;
                $number = floor($sisabagi);

                if($key == "puluh" && $sisabagi != 0 ){
                    $return .= ucwords($belasan[$sisabagi-1]);
                    break;
                }else{
                    if($key != "satuan"){
                        $return .= ucwords($bukansatuan[$hasilbagi-1]." ". $key)." ";
                    }else{
                        $return .= ucwords($satuan[$hasilbagi-1])." ";
                    }
                }

                if($sisabagi == 0){
                    break;
                }
            }else{
                continue;
            }
        }

        return $return;
    }

}
