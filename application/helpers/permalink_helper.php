<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_permalink'))
{
	function set_permalink($id,$content)
	{
		$karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
		$hapus_karakter_aneh = strtolower(str_replace($karakter,"",$content));
		$tambah_strip = strtolower(str_replace(' ', '-', $hapus_karakter_aneh));
		$link_akhir = $id.'/'.$tambah_strip;
		return $link_akhir;
	}

    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function GetCheckboxes($table, $key, $Label, $Nilai='') {
        $s = "select * from $table order by tag_name";
        $r = mysql_query($s);
        $_arrNilai = explode(',', $Nilai);
        $str = '';
        while ($w = mysql_fetch_array($r)) {
            $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
            $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck> $w[$Label] ";
        }
        return $str;
    }

    function getday($tgl,$sep){
    $sepparator = $sep; //separator. contoh: '-', '/'
    $parts = explode($sepparator, $tgl);
    $d = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));

    if ($d=='Monday'){
        return 'Senin';
    }elseif($d=='Tuesday'){
        return 'Selasa';
    }elseif($d=='Wednesday'){
        return 'Rabu';
    }elseif($d=='Thursday'){
        return 'Kamis';
    }elseif($d=='Friday'){
        return 'Jumat';
    }elseif($d=='Saturday'){
        return 'Sabtu';
    }elseif($d=='Sunday'){
        return 'Minggu';
    }else{
        return 'ERROR!';
    }
}
}