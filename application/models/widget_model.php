<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widget_Model extends CI_Model {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Model untuk menangani semua query database aplikasi
     **/

    public function getAllData($table)
    {
        return $this->db->get($table);
    }

    public function getAllDataLimited($table,$limit,$offset)
    {
        return $this->db->get($table, $limit, $offset);
    }

    public function getSelectedDataLimited($table,$data,$limit,$offset)
    {
        return $this->db->get_where($table, $data, $limit, $offset);
    }

    //select table
    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }

    //update table
    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    //Query manual
    function manualQuery($q)
    {
        return $this->db->query($q);
    }

      function get_all_post_by_w_1_1()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.post_tgl,
        tbl_post.post_time,tbl_post.publish,tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kiri_text_1.1');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }
    function get_all_post_by_w_1_2()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.post_tgl,
        tbl_post.post_time,tbl_post.publish,tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kiri_text_1.2');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_1_1()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_1.1');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }
    function get_all_post_by_wkanan_1_2()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_1.2');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_2_1()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_2.1');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_2_2()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_2.2');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_3_1()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_3.1');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_3_2()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_3.2');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_4_1()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_4.1');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_wkanan_4_2()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,tbl_post.publish,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_name','kanan_text_4.2');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }



    function get_all_widget()
    {
        $this->db->select('*');
        $this->db->from('tbl_widget');
        $this->db->order_by('widget_id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }
    /* --------------------------------------------- Area Widget kiri text 1.1 ------------------------------------------ */

    public function CariIdWidgetByKiriText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKiri1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKiri1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
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

    public function CariJudulWidgetByKiriText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
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

    public function CariImageWidgetByKiriText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
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

    public function CariJudulIsiWidgetByKiriText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
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
    public function CariIsiWidgetByKiriText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.1'";
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

    /* --------------------------------------- End of Area Widget kiri text 1.1 ------------------------------------- */

    /* --------------------------------------------- Area Widget kiri text 1.2 ------------------------------------------ */

    public function CariIdWidgetByKiriText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKiri1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKiri1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
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

    public function CariJudulWidgetByKiriText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
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

    public function CariImageWidgetByKiriText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
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

    public function CariJudulIsiWidgetByKiriText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
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
    public function CariIsiWidgetByKiriText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kiri_text_1.2'";
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

    /* --------------------------------------- End of Area Widget kiri text 1.2 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 1.1 ------------------------------------------ */

    public function CariIdWidgetByKananText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
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

    public function CariJudulWidgetByKananText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
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

    public function CariImageWidgetByKananText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
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

    public function CariJudulIsiWidgetByKananText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText1_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.1'";
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

    /* --------------------------------------- End of Area Widget kanan text 1.1 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 1.2 ------------------------------------------ */

    public function CariIdWidgetByKananText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
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

    public function CariJudulWidgetByKananText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
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

    public function CariImageWidgetByKananText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
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

    public function CariJudulIsiWidgetByKananText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText1_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_1.2'";
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

    /* --------------------------------------- End of Area Widget kanan text 1.2 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 2.1 ------------------------------------------ */

    public function CariIdWidgetByKananText2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
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

    public function CariJudulWidgetByKananText2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
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

    public function CariImageWidgetByKananText2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
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

    public function CariJudulIsiWidgetByKananText2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText2_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.1'";
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

    /* --------------------------------------- End of Area Widget kanan text 2.1 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 2.2 ------------------------------------------ */

    public function CariIdWidgetByKananText2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
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

    public function CariJudulWidgetByKananText2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
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

    public function CariImageWidgetByKananText2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
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

    public function CariJudulIsiWidgetByKananText2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText2_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_2.2'";
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

    /* --------------------------------------- End of Area Widget kanan text 2.2 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 3.1 ------------------------------------------ */

    public function CariIdWidgetByKananText3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
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

    public function CariJudulWidgetByKananText3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
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

    public function CariImageWidgetByKananText3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
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

    public function CariJudulIsiWidgetByKananText3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText3_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.1'";
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

    /* --------------------------------------- End of Area Widget kanan text 3.1 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 3.2 ------------------------------------------ */

    public function CariIdWidgetByKananText3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
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

    public function CariJudulWidgetByKananText3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
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

    public function CariImageWidgetByKananText3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
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

    public function CariJudulIsiWidgetByKananText3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText3_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_3.2'";
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

    /* --------------------------------------- End of Area Widget kanan text 3.2 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 4.1 ------------------------------------------ */

    public function CariIdWidgetByKananText4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
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

    public function CariJudulWidgetByKananText4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
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

    public function CariImageWidgetByKananText4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
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

    public function CariJudulIsiWidgetByKananText4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText4_1(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.1'";
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

    /* --------------------------------------- End of Area Widget kanan text 4.1 ------------------------------------- */

    /* --------------------------------------------- Area Widget kanan text 4.2 ------------------------------------------ */

    public function CariIdWidgetByKananText4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByHariKanan4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_tgl;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariWidgetByTimeKanan4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
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

    public function CariJudulWidgetByKananText4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
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

    public function CariImageWidgetByKananText4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
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

    public function CariJudulIsiWidgetByKananText4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->widget_judul_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public function CariIsiWidgetByKananText4_2(){
        $t = "SELECT * FROM tbl_widget WHERE widget_name = 'kanan_text_4.2'";
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

    /* --------------------------------------- End of Area Widget kanan text 4.2 ------------------------------------- */

    function get_all_baner()
    {
        $this->db->select('*');
        $this->db->from('tbl_baner');
        $this->db->order_by('baner_id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function CariImageBanerByKiri1_1(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kiri_baner_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKiri1_1(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kiri_baner_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariImageBanerByKiri1_2(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kiri_baner_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKiri1_2(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kiri_baner_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariImageBanerByKiri1_3(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kiri_baner_1.3'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKiri1_3(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kiri_baner_1.3'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }



    public function CariImageBanerByKanan1_1(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKanan1_1(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.1'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariImageBanerByKanan1_2(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKanan1_2(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.2'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariImageBanerByKanan1_3(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.3'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKanan1_3(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.3'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariImageBanerByKanan1_4(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.4'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->baner_image;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public function CariPublishBanerByKanan1_4(){
        $t = "SELECT * FROM tbl_baner WHERE baner_name = 'kanan_baner_1.4'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->publish;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    function get_all_panel()
    {
        $this->db->select('*');
        $this->db->from('tbl_panel');
        $this->db->order_by('panel_id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_pooling()
    {
        $this->db->select('*');
        $this->db->from('tbl_polling');
        $this->db->order_by('id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_widget()
    {
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.kategori_id,
        tbl_kategori.kategori,tbl_widget.widget_name,tbl_widget.widget_judul');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id','left');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->where('tbl_widget.widget_id',$p_kode[0]);
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }
}

/* End of file widget_model.php */
/* Location: ./application/models/widget_model.php */