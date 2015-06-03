<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_forum';
            $d['judul_halaman']='FORUM';
            $d['judul_keterangan']="Daftar data Forum";

            $d['jml_topik_perkenalan'] = $this->app_model->JmlTopikPerkenalan();
            $d['jml_topik_pengumuman'] = $this->app_model->JmlTopikPengumuman();
            $d['jml_topik_saran'] = $this->app_model->JmlTopikSaran();
            $d['jml_topik_pojok'] = $this->app_model->JmlTopikPojok();

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/forum/room',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function perkenalan() {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']         ="forum_perkenalan";
            $d['judul_halaman'] = "Selamat Datang & Perkenalan";
            $d['judul_keterangan']="Daftar data Forum Perkenalan";

            $d['all_forum']	    = $this->app_model->get_all_forum_perkenalan();

            $d['content']= $this->load->view('admin/forum/perkenalan',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function pengumuman() {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']         ="forum_pengumuman";
            $d['judul_halaman'] = "Pengumuman";
            $d['judul_keterangan']="Daftar data Forum Pengumuman";

            $d['all_forum']	    = $this->app_model->get_all_forum_pengumuman();

            $d['content']= $this->load->view('admin/forum/pengumuman',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function saran() {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']         ="forum_saran";
            $d['judul_halaman'] = "Saran";
            $d['judul_keterangan']="Daftar data Forum Saran";

            $d['all_forum']	    = $this->app_model->get_all_forum_saran();

            $d['content']= $this->load->view('admin/forum/saran',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function pojok() {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']         ="forum_pojok";
            $d['judul_halaman'] = "Pojok Komunitas";
            $d['judul_keterangan']="Daftar data Forum Pojok Komunitas";

            $d['all_forum']	    = $this->app_model->get_all_forum_pojok();

            $d['content']= $this->load->view('admin/forum/pojok',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */