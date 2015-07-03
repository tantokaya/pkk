<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graf_Model extends CI_Model {

	/**
     * @author : Hartanto Kurniawan,S.Kom and Aditya Nursyahbani,S.SI
     * @web : http://www.risetkomputer.com
     * @keterangan : Model untuk menangani
     **/


    public function GrafikTopik1(){
        $t = "SELECT COUNT(*) as topik1 FROM `tbl_topik`
			WHERE katpos_id='1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->topik1;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }
    public function GrafikTopik2(){
        $t = "SELECT COUNT(*) as topik2 FROM `tbl_topik`
			WHERE katpos_id='2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->topik2;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }

    public function GrafikTopik3(){
        $t = "SELECT COUNT(*) as topik3 FROM `tbl_topik`
			WHERE katpos_id='3'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->topik3;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }

    public function GrafikTopik4(){
        $t = "SELECT COUNT(*) as topik4 FROM `tbl_topik`
			WHERE katpos_id='4'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->topik4;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }

    public function GrafikAgenda($bln,$thn){
        if($bln==''){
            $t = "SELECT year(agenda_mulai) as th, count(*) as jml
				FROM tbl_agenda
				WHERE year(agenda_mulai)='$thn'
				GROUP BY year(agenda_mulai)";
        }else{
            $t = "SELECT month(agenda_mulai) as bln, year(agenda_mulai) as th, count(*) as jml
				FROM tbl_agenda
				WHERE month(agenda_mulai)='$bln' AND year(agenda_mulai)='$thn'
				GROUP BY month(agenda_mulai),year(agenda_mulai)";
        }
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->jml;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }
}

/* End of file graf_model.php */
/* Location: ./application/models/graf_model.php */