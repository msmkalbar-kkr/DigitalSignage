<?php

function toDecimal(mixed $value): string
{
    if ($value === null || $value === '') {
        return '0.00';
    }

    $v = trim((string) $value);

    // simpan hanya digit, dot, comma, minus
    $v = preg_replace('/[^\d\.,\-]/', '', $v);

    // catat minus dan hapus sementara
    $isNegative = false;
    if (strpos($v, '-') !== false) {
        $isNegative = true;
        $v = str_replace('-', '', $v);
    }

    $hasDot = strpos($v, '.') !== false;
    $hasComma = strpos($v, ',') !== false;

    // Jika ada keduanya: dot = ribuan, comma = decimal
    if ($hasDot && $hasComma) {
        $v = str_replace('.', '', $v); // hapus ribuan
        $v = str_replace(',', '.', $v); // koma -> titik decimal
    }
    // Jika hanya comma -> koma sebagai decimal
    elseif ($hasComma && !$hasDot) {
        $v = str_replace(',', '.', $v);
    }
    // Jika hanya dot -> perlu cek apakah dot adalah ribuan atau decimal
    elseif ($hasDot && !$hasComma) {
        // jika dot terakhir diikuti tepat 3 digit => kemungkinan pemisah ribuan
        if (preg_match('/\.\d{3}$/', $v) || preg_match('/^\d{1,3}(\.\d{3})+$/', $v)) {
            // hapus semua titik (semua dot dianggap pemisah ribuan)
            $v = str_replace('.', '', $v);
        } else {
            // dot dianggap sebagai decimal separator -> biarkan
            // (no-op)
        }
    } else {
        // tidak ada dot/comma -> integer string (no-op)
    }

    // setelah pembersihan, pastikan cuma digit, dot, minus
    $v = preg_replace('/[^\d\.\-]/', '', $v);

    // jika kosong atau bukan angka -> 0.00
    if ($v === '' || !preg_match('/\d/', $v)) {
        return '0.00';
    }

    if ($isNegative) {
        $v = '-' . $v;
    }

    // cast ke float lalu format 2 desimal
    $num = (float) $v;

    return number_format($num, 2, '.', '');
}

// function rupiah($value)
// {
//     if ($value === null || $value === '') {
//         return '0';
//     }

//     // hapus semua kecuali angka dan titik
//     $clean = preg_replace('/[^0-9.]/', '', $value);

//     // amankan konversi
//     $number = is_numeric($clean) ? (float) $clean : 0;

//     return number_format($number, 0, ',', '.');
// }

function rupiah($value)
{
    if ($value === null || $value === '') {
        return '0';
    }

    // Hilangkan semua kecuali angka dan koma/titik
    $clean = preg_replace('/[^0-9.,]/', '', $value);

    // Jika ada titik dan koma, asumsikan format ID (12.000.000,00)
    if (strpos($clean, ',') !== false && strpos($clean, '.') !== false) {
        $clean = str_replace('.', '', $clean);
        $clean = str_replace(',', '.', $clean);
    }
    // Jika hanya titik → anggap desimal (12000000.00)
    elseif (strpos($clean, '.') !== false) {
        $clean = str_replace(',', '', $clean);
    }
    // Jika hanya koma → ganti jadi desimal
    elseif (strpos($clean, ',') !== false) {
        $clean = str_replace(',', '.', $clean);
    }

    return number_format((float) $clean, 0, ',', '.');
}



function tgl_indo($tgl)
{
    $tanggal  = explode('-', $tgl);
    $bulan  = MSbulan($tanggal[1]);
    $tahun  =  $tanggal[0];
    // dd($tanggal);
    return  $tanggal[2] . ' ' . $bulan . ' ' . $tahun;
}

// hendra
if (!function_exists('MSbulan')) {
    function MSbulan($bulan)
    {
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }

        return $bulan;
    }


    function terbilang($number)
    {
        if (!is_numeric($number)) {
            return false;
        }

        if ($number < 0) {
            $hasil = "Minus " . trim(depan($number));
            $poin = trim(belakang($number));
        } else {
            $poin = trim(belakang($number));
            $hasil = trim(depan($number));
        }

        if ($poin) {
            $hasil = $hasil . " koma " . $poin . " Rupiah";
        } else {
            $hasil = $hasil . " Rupiah";
        }
        return $hasil;
    }

    function depan($number)
    {
        $number = abs($number);
        $nomor_depan = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $depans = "";

        if ($number < 12) {
            $depans = " " . $nomor_depan[$number];
        } else if ($number < 20) {
            $depans = depan($number - 10) . " belas";
        } else if ($number < 100) {
            $depans = depan($number / 10) . " puluh " . depan(fmod($number, 10));
        } else if ($number < 200) {
            $depans = "seratus " . depan($number - 100);
        } else if ($number < 1000) {
            $depans = depan($number / 100) . " ratus " . depan(fmod($number, 100));
            //$depans = depan($number/100)." Ratus ".depan($number%100);
        } else if ($number < 2000) {
            $depans = "seribu " . depan($number - 1000);
        } else if ($number < 1000000) {
            $depans = depan($number / 1000) . " ribu " . depan(fmod($number, 1000));
        } else if ($number < 1000000000) {
            $depans = depan($number / 1000000) . " juta " . depan(fmod($number, 1000000));
        } else if ($number < 1000000000000) {
            $depans = depan($number / 1000000000) . " milyar " . depan(fmod($number, 1000000000));
            //$depans = ($number/1000000000)." Milyar ".(fmod($number,1000000000))."------".$number;

        } else if ($number < 1000000000000000) {
            $depans = depan($number / 1000000000000) . " triliun " . depan(fmod($number, 1000000000000));
            //$depans = ($number/1000000000)." Milyar ".(fmod($number,1000000000))."------".$number;

        } else {
            $depans = "Undefined";
        }
        return $depans;
    }

    function belakang($number)
    {
        $number = abs($number);
        $number = stristr($number, ".");
        $nomor_belakang = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan");

        $belakangs = "";
        $length = strlen($number);
        $i = 1;
        while ($i < $length) {
            $get = substr($number, $i, 1);
            $i++;
            $belakangs .= " " . $nomor_belakang[$get];
        }
        return $belakangs;
    }
}
