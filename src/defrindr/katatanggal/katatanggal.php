<?php
namespace defrindr\katatanggal;

class katatanggal
{
    protected $dates;
    protected $result = "";
    protected $arr = [];
    const arr = ["Tanggal ", "Bulan ", "Tahun "];

    /**
     * @param date $date
     * format params 'd-m-Y'
     *
     *
     */
    public function __construct($date, $withPrefix = true)
    {
        $dates = $this->parseDate($date);
        $day = $dates[0];
        $this->dates = array_slice($dates, 1);

        $day = $this->setDay($day);
        

        array_push($this->arr, "Hari $day");

        for ($i = 0; $i < count($this->dates); $i++) {
            array_push(
                $this->arr,
                self::arr[$i] . $this->terbilang($this->dates[$i])
            );
        }

        foreach ($this->arr as $val) {
            if(!$withPrefix){
                $this->result .= $val . ", ";
            }else{
                if (explode(" ", $val)[0] == "Hari") {
                    $this->result .= $val . ", ";
                } else {
                    $this->result .= $val . " ";
                }
            }
        }

        $this->result = trim($this->result);
        if(!$withPrefix){
            $this->result = substr($this->result,0,-1);
            $prefixs = self::arr;
            array_push($prefixs,"Hari ");

            foreach($prefixs as $prefix){
                $this->result = str_replace($prefix, "", $this->result);
            }
        }

        return $this;
    }

    public function parseDate($date)
    {
        $arr = explode('-', $date);

        if (!checkdate($arr[1], $arr[0], $arr[2])) {
            throw new \Exception("Date format not valid");
        }

        $strtotime = strtotime($date);
        $date = date('w-d-m-Y', $strtotime);
        $arr = explode('-', $date);
        return $arr;
    }

    public function getDay($withPrefix = true)
    {
        $day = (!$withPrefix) ? str_replace("Hari ", "", $this->arr[0]) : $this->arr[0];
        return $day;
    }
    public function getDate($withPrefix = true)
    {
        $date = (!$withPrefix) ? str_replace("Tanggal ", "", $this->arr[1]) : $this->arr[1];
        return $date;
    }
    public function getMonth($withPrefix = true)
    {
        $month = (!$withPrefix) ? str_replace("Bulan ", "", $this->arr[2]) : $this->arr[2];
        return $month;
    }
    public function getYear($withPrefix = true)
    {
        $year = (!$withPrefix) ? str_replace("Tahun ", "", $this->arr[3]) : $this->arr[3];
        return $year;
    }

    public function __toString()
    {
        return $this->get();
    }
    public function get()
    {
        return $this->result;
    }

    public function setDay($day)
    {
        $days = [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jum'at",
            "Sabtu",
        ];

        return $days[$day];
    }

    public function terbilang($number)
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
                        $word = $bukansatuan[$hasilbagi - 1]." ";
                        if ($hasilbagi - 1 == 0) {
                            $word = trim($word);
                        }
                        $word .= $key;
                        $return .= ucwords($word)." ";
                    } else {
                        $word = $bukansatuan[$hasilbagi - 1];
                        if ($hasilbagi - 1 == 0) {
                            $word = "satu";
                        }
                        $return .= ucwords($word). " ";
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
