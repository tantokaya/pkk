<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik_Model extends CI_Model {

    public function pengunjung(){
        date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
        $ip = $_SERVER['REMOTE_ADDR'];
        $tanggal = date("Ymd");
        $waktu   = time();

        $text = "SELECT * FROM tbl_statistik WHERE ip='$ip' AND tanggal='$tanggal'";
        $stat = $this->db->query($text);
        $row = $stat->num_rows();
        if($row>0){
            $this->app_model->manualQuery("UPDATE tbl_statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
        }else{
            $this->app_model->manualQuery("INSERT INTO tbl_statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
        }
        //$hasil = $this->app_model->manualQuery("SELECT sum(hits) as total FROM statistik");
        $hasil = $this->db->query("SELECT COUNT(hits) as total FROM tbl_statistik");
        foreach($hasil->result() as $dt){
            $totalpengunjung=$dt->total;
        }

        $hasil = $totalpengunjung;
        /*
        $d["ip"] = $ip;
        $d["browser"] = $this->agent->browser();
        $d["os"] = $this->agent->platform();
        */
        return $hasil;
    }

    public function total_hits(){
        $hasilhits = $this->db->query("SELECT ip, sum(hits) as totalhit FROM tbl_statistik");
        foreach($hasilhits->result() as $dt){
            $totalhits = $dt->totalhit;
        }

        $hasilhits = $totalhits;

        return $hasilhits;
    }

}
	
	