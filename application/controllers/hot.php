<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hot extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_hot';
            $d['judul_halaman']='Daftar Hot News';
            $d['judul_keterangan']="Daftar data Hot News Berita";

            $d['all_hot']	    = $this->app_model->get_all_hot();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/hot/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_hot';
            $d['judul_halaman']='Tambah HOT NEWS';
            $d['judul_keterangan']="Tambah data Hot News";

            $d['kode']      = '';
            $d['judul']     = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/hot/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $tanggal = gmdate("Y-m-d", time()+60*60*7);
            $time = gmdate("H:i:s", time()+60*60*7);
            $nama = $this->app_model->CariUserPengguna();

            $up['username']	    = $nama;
            $up['hot_date']     = $tanggal;
            $up['hot_time']     = $time;
            $up['hot_news']     = $this->input->post('judul');

            $id['hot_id']       =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_hot",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_hot",$up,$id);
            }else{
                $this->app_model->insertData("tbl_hot",$up);
            }
            redirect('hot');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_hot";
            $d['judul_halaman']="Edit HOT NEWS";
            $d['judul_keterangan']="Edit Hot News Berita";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_hot WHERE hot_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->hot_id;
                    $d['judul']		= $db->hot_news;
                }
            }else{
                $d['judul']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/hot/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_hot WHERE hot_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."hot'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file hot.php */
/* Location: ./application/controllers/hot.php */