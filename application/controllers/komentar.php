<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_komentar';
            $d['judul_halaman']='Daftar KOMENTAR';
            $d['judul_keterangan']="Daftar data Komentar Pembaca";

            $d['all_komentar']	        = $this->app_model->get_all_komentar();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/komentar/view',$d,true);
            $this->load->view('admin/home_adm',$d);

        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_komentar';
            $d['judul_halaman']='Tambah KOMENTAR';
            $d['judul_keterangan']="Tambah data Komentar Pembaca";

            $d['kode']      = '';
            $d['name']      = '';
            $d['web']       = '';
            $d['isi']       = '';
			$d['publish']   ='';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/komentar/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['komen_name']     = $this->input->post('name');
            $up['komen_web']     = $this->input->post('web');
            $up['komen_isi']     = $this->input->post('isi');
			$up['publish']       = $this->input->post('publish');
			
            $id['komen_id']   =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_komentar",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_komentar",$up,$id);
            }else{
                $this->app_model->insertData("tbl_komentar",$up);
            }
            redirect('komentar');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_komentar";
            $d['judul_halaman']="Edit KOMENTAR";
            $d['judul_keterangan']="Edit Komentar Kata";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_komentar WHERE komen_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->komen_id;
                    $d['name']		= $db->komen_name;
                    $d['web']		= $db->komen_web;
                    $d['isi']		= $db->komen_isi;
					$d['publish']   = $db->publish;
                }
            }else{
                $d['name']	    = '';
                $d['web']	    = '';
                $d['isi']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/komentar/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_komentar WHERE komen_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."komentar'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file komentar.php */
/* Location: ./application/controllers/komentar.php */