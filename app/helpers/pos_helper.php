<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists('get_printer_chars_per_line')) {
    function get_printer_chars_per_line() {
        return 42;
    }
}

if(! function_exists('product_name')) {
    function product_name($name, $size = NULL) {
        if (!$size) { $size = get_printer_chars_per_line(); }
        return character_limiter($name, ($size-5));
    }
}

if(! function_exists('drawLine')) {
    function drawLine($size = NULL) {
        if (!$size) { $size = get_printer_chars_per_line(); }
        $line = '';
        for ($i = 1; $i <= $size; $i++) {
            $line .= '-';
        }
        return $line."\n";
    }
}

if(! function_exists('printLine')) {
    function printLine($str, $size = NULL, $sep = ":", $space = NULL) {
        if (!$size) { $size = get_printer_chars_per_line(); }
        $size = $space ? $space : $size;
        $lenght = strlen($str);
        list($first, $second) = explode(":", $str, 2);
        $line = $first . ($sep == ":" ? $sep : '');
        for ($i = 1; $i < ($size - $lenght); $i++) {
            $line .= ' ';
        }
        $line .= ($sep != ":" ? $sep : '') . $second;
        return $line;
    }
}

if(! function_exists('printText')) {
    function printText($text, $size = NULL) {
        if (!$size) { $size = get_printer_chars_per_line(); }
        $line = wordwrap($text, $size, "\\n");
        return $line;
    }
}

if(! function_exists('taxLine')) {
    function taxLine($name, $code, $qty, $amt, $tax, $size = NULL) {
        if (!$size) { $size = get_printer_chars_per_line(); }
        return printLine(printLine(printLine(printLine($name . ':' . $code, 16, '') . ':' . $qty, 22, '') . ':' . $amt, 33, '') . ':' . $tax, $size, '');
    }
}

if ( ! function_exists('character_limiter')) {
    function character_limiter($str, $n = 500, $end_char = '&#8230;') {
        if (mb_strlen($str) < $n) {
            return $str;
        }
        $str = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\x0B", "\x0C"), ' ', $str));
        if (mb_strlen($str) <= $n) {
            return $str;
        }

        $out = '';
        foreach (explode(' ', trim($str)) as $val) {
            $out .= $val.' ';
            if (mb_strlen($out) >= $n) {
                $out = trim($out);
                return (mb_strlen($out) === mb_strlen($str)) ? $out : $out.$end_char;
            }
        }
    }
}

if ( ! function_exists('word_wrap')) {
    function word_wrap($str, $charlim = 76) {
        is_numeric($charlim) OR $charlim = 76;
        $str = preg_replace('| +|', ' ', $str);
        if (strpos($str, "\r") !== FALSE) {
            $str = str_replace(array("\r\n", "\r"), "\n", $str);
        }
        $unwrap = array();
        if (preg_match_all('|\{unwrap\}(.+?)\{/unwrap\}|s', $str, $matches)) {
            for ($i = 0, $c = count($matches[0]); $i < $c; $i++)
            {
                $unwrap[] = $matches[1][$i];
                $str = str_replace($matches[0][$i], '{{unwrapped'.$i.'}}', $str);
            }
        }

        $str = wordwrap($str, $charlim, "\n", FALSE);
        $output = '';
        foreach (explode("\n", $str) as $line) {
            if (mb_strlen($line) <= $charlim) {
                $output .= $line."\n";
                continue;
            }
            $temp = '';
            while (mb_strlen($line) > $charlim) {
                if (preg_match('!\[url.+\]|://|www\.!', $line)) {
                    break;
                }
                $temp .= mb_substr($line, 0, $charlim - 1);
                $line = mb_substr($line, $charlim - 1);
            }
            if ($temp !== '') {
                $output .= $temp."\n".$line."\n";
            } else {
                $output .= $line."\n";
            }
        }

        if (count($unwrap) > 0) {
            foreach ($unwrap as $key => $val) {
                $output = str_replace('{{unwrapped'.$key.'}}', $val, $output);
            }
        }

        return $output;
    }
}

function getBulan($bln){
    switch ($bln){
        case 1: 
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
} 

function getBulan2($bln){
    switch ($bln){
        case 1: 
            return "01";
            break;
        case 2:
            return "02";
            break;
        case 3:
            return "03";
            break;
        case 4:
            return "04";
            break;
        case 5:
            return "05";
            break;
        case 6:
            return "06";
            break;
        case 7:
            return "07";
            break;
        case 8:
            return "08";
            break;
        case 9:
            return "09";
            break;
        case 10:
            return "10";
            break;
        case 11:
            return "11";
            break;
        case 12:
            return "12";
            break;
    }
} 

function getBulan3($bln){
    switch ($bln){
        case 1: 
            return "Jan";
            break;
        case 2:
            return "Feb";
            break;
        case 3:
            return "Mar";
            break;
        case 4:
            return "Apr";
            break;
        case 5:
            return "May";
            break;
        case 6:
            return "Jun";
            break;
        case 7:
            return "Jul";
            break;
        case 8:
            return "Aug";
            break;
        case 9:
            return "Sep";
            break;
        case 10:
            return "Oct";
            break;
        case 11:
            return "Nov";
            break;
        case 12:
            return "Dec";
            break;
    }
} 

function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;       
}

function tgl_indo2($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan2(substr($tgl,6,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.'-'.$bulan.'-'.$tahun;       
}

function tgl_indo3($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan3(substr($tgl,5,2));
    $tahun = substr($tgl,2,2);
    return $tanggal.'-'.$bulan.'-'.$tahun;       
}

function tgl_indoo($tgl){
    $bulan = getBulan(substr($tgl,0,2));
    $tahun = substr($tgl,3,4);
    return $bulan.' '.$tahun;       
}

function tgl_slash($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = substr($tgl,5,2);
    $tahun = substr($tgl,0,4);
    return $tanggal.'/'.$bulan.'/'.$tahun;       
}