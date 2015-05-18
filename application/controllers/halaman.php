<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_halaman';
            $d['judul_halaman']='Daftar Halaman';
            $d['judul_keterangan']="Daftar data Halaman Utama";

            $d['all_halaman']	    = $this->app_model->get_all_halaman();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/halaman/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_halaman';
            $d['judul_halaman']='Tambah HALAMAN';
            $d['judul_keterangan']="Tambah data Halaman";

            $d['kode']      = '';
            $d['name']      = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/halaman/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['hal_name']     = $this->input->post('name');

            $id['hal_id']   =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_halaman",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_halaman",$up,$id);
            }else{
                $this->app_model->insertData("tbl_halaman",$up);
            }
            redirect('halaman');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_halaman";
            $d['judul_halaman']="Edit Halaman";
            $d['judul_keterangan']="Edit Halaman aplikasi";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_halaman WHERE hal_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->hal_id;
                    $d['name']		= $db->hal_name;
                }
            }else{
                $d['name']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/halaman/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_halaman WHERE hal_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."halaman'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */