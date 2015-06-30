<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/

    function __construct(){
        parent::__construct();
        $this->load->helper('permalink_helper');
        $this->load->model('polling_model');
    }

    public function detail()
    {
        $d['title']                 = $this->post_model->CariPageByTitle();
        $d['title_aplikasi']        = $this->config->item('nama_aplikasi');
        $d['keywords']              = $this->post_model->CariPageByKeywords();
        $d['descriptions']          = "";
        $d['all_panel']             = $this->app_model->get_all_panel();

        $d['all_hot']	            = $this->app_model->get_all_hot();
        $d['all_new_post']	        = $this->app_model->get_all_new_post();
        $d['all_post_by_kategori']	= $this->app_model->get_all_post_by_kategori();
        $d['all_post_by_detail']	= $this->app_model->get_all_post_by_detail();
        $d['all_post_by_w_1_1']	    = $this->widget_model->get_all_post_by_w_1_1();
        $d['all_post_by_w_1_2']	    = $this->widget_model->get_all_post_by_w_1_2();
	    $d['all_new_post_baca']	    = $this->app_model->get_all_new_post_baca();

        $d['jumlah_pengunjung'] = $this->statistik_model->pengunjung();


        // handle polling data
        $d['polling'] = $this->polling_model->get_polling_data('tbl_polling');
        $vote = 0;
        for($i=1;$i<=5;$i++){
            $hitung = $this->db->query("SELECT vote{$i} as vote FROM tbl_polling");
            $result = $hitung->row_array();

            $vote = $vote + $result['vote'];

        }

        $d['total_vote'] = $vote;

        $d['content']= $this->load->view('halaman',$d,true);
        $this->load->view('home',$d);
    }

    public function MenuUtama()
    {
        $tampil=mysql_query("SELECT * FROM tbl_halaman");
        while($r=mysql_fetch_array($tampil)){
            echo "<li>";
            if($r['hal_id']== '1') {
            echo "<a href='".base_url()."'>$r[hal_name] </a>";
            } else {
                echo "<a href='#'>$r[hal_name]</a>";
            }

        $tampil_sub = mysql_query("SELECT * FROM tbl_sub_halaman LEFT JOIN tbl_halaman ON tbl_sub_halaman.hal_id = tbl_halaman.hal_id
        WHERE tbl_sub_halaman.hal_id = tbl_halaman.hal_id  AND tbl_sub_halaman.hal_id = $r[hal_id]");
            $jml = mysql_num_rows($tampil_sub);
            if($jml > 0) {
                echo "<ul>";
                while($w=mysql_fetch_array($tampil_sub)){
                    $link = set_permalink($w['sub_hal_id'],$w['sub_hal_name']);
                    $url = $w['link_url'];
                    $tab = $w['new_tab'];
                    echo "<li>";
                    if($w['link_url'] != ''){
                            $url = prep_url($url);
                            echo "<a href='$url' target='$tab'>$w[sub_hal_name]</a>";
                        } else {
                            echo "<a href='".base_url()."pages/detail/".$link."'>$w[sub_hal_name]</a>";
                    }
                    echo "</li>";
                }
                echo "</ul>";
                echo "</li>";
            } else {
                echo "</li>";
            }
        }
    }


}

/* End of file index.php */
/* Location: ./application/controllers/home.php */