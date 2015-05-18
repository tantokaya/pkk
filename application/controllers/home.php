<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/

    function __construct(){
        parent::__construct();
        $this->load->helper('permalink_helper');
    }


    public function index()
    {
            $d['title']                 = $this->config->item('nama_aplikasi');
            $d['title_aplikasi']        = "Pusat Komunitas Kreatif UMKM";
            $d['keywords']              = "Puskomkreatif, UKM, Usaha";
            $d['descriptions']          = "Pusat Komunitas Kreatif Indonesia";

            $d['all_hot']	            = $this->app_model->get_all_hot();
            $d['all_new_post']	        = $this->app_model->get_all_new_post();
	        $d['all_post_by_kategori']	= $this->app_model->get_all_post_by_kategori();
            $d['all_new_post_baca']	    = $this->app_model->get_all_new_post_baca();
            $d['all_slide']	            = $this->app_model->get_all_slide();
            $d['all_post_by_w_1_1']	    = $this->widget_model->get_all_post_by_w_1_1();
            $d['all_post_by_w_1_2']	    = $this->widget_model->get_all_post_by_w_1_2();
            $d['all_post_by_wkanan_1_1']= $this->widget_model->get_all_post_by_wkanan_1_1();
            $d['all_post_by_wkanan_1_2']= $this->widget_model->get_all_post_by_wkanan_1_2();
            $d['all_post_by_wkanan_2_1']= $this->widget_model->get_all_post_by_wkanan_2_1();
            $d['all_post_by_wkanan_2_2']= $this->widget_model->get_all_post_by_wkanan_2_2();
            $d['all_post_by_wkanan_3_1']= $this->widget_model->get_all_post_by_wkanan_3_1();
            $d['all_post_by_wkanan_3_2']= $this->widget_model->get_all_post_by_wkanan_3_2();
            $d['all_post_by_wkanan_4_1']= $this->widget_model->get_all_post_by_wkanan_4_1();
            $d['all_post_by_wkanan_4_2']= $this->widget_model->get_all_post_by_wkanan_4_2();

            $d['jumlah_pengunjung'] = $this->statistik_model->pengunjung();

            $text = "SELECT * FROM tbl_kategori ORDER BY kategori ASC";
            $d['l_kategori'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('content',$d,true);
            $this->load->view('home',$d);

    }
    public function generate_event()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $data = $this->app_model->get_all_event();
            print_r(json_encode($data));
        }
    }


}

/* End of file index.php */
/* Location: ./application/controllers/home.php */