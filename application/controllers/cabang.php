<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabang extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_cabang';
            $d['judul_halaman']='Daftar Cabang';
            $d['judul_keterangan']="Daftar data Cabang Puskomkreatif";

            $d['all_puskomkreatif']	    = $this->app_model->get_all_puskomkreatif();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/cabang/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_cabang';
            $d['judul_halaman']='Tambah Cabang';
            $d['judul_keterangan']="Tambah data Cabang Puskomkreatif";

            $d['kode']      = '';
            $d['name']      = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/cabang/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['cabang_name']     = $this->input->post('name');
            $up['cabang_alamat']   = $this->input->post('alamat');

            $id['cabang_id']   =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_cabang",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_cabang",$up,$id);
            }else{
                $this->app_model->insertData("tbl_cabang",$up);
            }
            redirect('cabang');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_cabang";
            $d['judul_halaman']="Edit Cabang";
            $d['judul_keterangan']="Edit Cabang Puskomkreatif";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_cabang WHERE cabang_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->cabang_id;
                    $d['name']		= $db->cabang_name;
                    $d['alamat']	= $db->cabang_alamat;
                }
            }else{
                $d['name']	    = '';
                $d['alamat']	= '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/cabang/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_cabang WHERE cabang_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."cabang'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */