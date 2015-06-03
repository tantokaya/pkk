<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_Model extends CI_Model {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Model untuk menangani semua query database aplikasi
     **/

    public  function CariPageByJudul(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_sub_halaman WHERE sub_hal_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->sub_hal_name;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPageByIsi(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_sub_halaman WHERE sub_hal_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->sub_hal_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByImage(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_widget WHERE widget_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByIsi(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_widget WHERE widget_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByJudul(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_widget WHERE widget_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTgl(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_widget WHERE widget_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $this->app_model->tgl_indo($h->widget_tgl);
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTime(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_widget WHERE widget_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_time;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

   function get_all_post_in_kategori($per_page, $offset) {
       $kode = $this->uri->segment(3);
       if($offset!=0) $offset = ($offset-1) * $per_page;
        $p_kode = explode("-",$kode);

        $this->db->select('tbl_post.post_id,tbl_post.post_tgl,tbl_post.post_time,tbl_post.post_judul,tbl_post.post_judul_seo,tbl_post.post_isi,
        tbl_post.post_gambar,tbl_post.post_tag,tbl_post.kategori_id,tbl_post.username,tbl_post.seo_title,tbl_post.seo_desc,tbl_post.seo_keywords,
        tbl_post.dibaca,tbl_post.publish,tbl_kategori.kategori');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->limit($per_page, $offset);
        $this->db->where('tbl_post.kategori_id',$p_kode[0]);
        $this->db->order_by('tbl_post.kategori_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_in_kategori_count() {
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);

        $this->db->select('tbl_post.post_id,tbl_post.post_tgl,tbl_post.post_time,tbl_post.post_judul,tbl_post.post_judul_seo,tbl_post.post_isi,
        tbl_post.post_gambar,tbl_post.post_tag,tbl_post.kategori_id,tbl_post.username,tbl_post.seo_title,tbl_post.seo_desc,tbl_post.seo_keywords,
        tbl_post.dibaca,tbl_post.publish,tbl_kategori.kategori');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->where('tbl_post.kategori_id',$p_kode[0]);
        $this->db->order_by('tbl_post.kategori_id', 'DESC');

        $query = $this->db->get();

        return $query->num_rows();
    }

    public  function CariPostByTitle(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->post_judul;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTitle(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_widget WHERE widget_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPostByKeywords(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->seo_keywords;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPostByDescriptions(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->seo_desc;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPageByTitle(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_sub_halaman WHERE sub_hal_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->sub_hal_name;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPageByKeywords(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_sub_halaman WHERE sub_hal_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->sub_hal_name;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariKategoriByTitle(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_kategori WHERE kategori_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->kategori;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariKategoriByKeywords(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_kategori WHERE kategori_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->kategori;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */