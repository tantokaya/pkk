<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kalender extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom and Aditya Nursyahbani
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman WP
     **/

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']             ="kalender";
            $d['judul_halaman']     = "Daftar Kalender Agenda";
            $d['judul_keterangan']  = "Tampilan Kalender Agenda";

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/forum/kalender',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }


}

/* End of file stkk.php */
/* Location: ./application/controllers/stkk.php */