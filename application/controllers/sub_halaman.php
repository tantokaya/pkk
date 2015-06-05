<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_halaman extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_sub_halaman';
            $d['judul_halaman']='Daftar Sub Halaman';
            $d['judul_keterangan']="Daftar data Sub Halaman";

            $d['all_sub_halaman']	    = $this->app_model->get_all_sub_halaman();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/sub_halaman/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_halaman';
            $d['judul_halaman']='Tambah SUB HALAMAN';
            $d['judul_keterangan']="Tambah data Sub Halaman";

            $d['kode']      = '';
            $d['name']      = '';
            $d['isi']       = '';
            $d['link']      = '';
            $d['posisi']    = '';
            $d['status']    = '';

            $text = "SELECT * FROM tbl_halaman ORDER BY hal_name ASC";
            $d['l_halaman'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/sub_halaman/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['sub_hal_name']     = $this->input->post('name');
            $up['sub_hal_isi']      = $this->input->post('isi');
            $up['hal_id']           = $this->input->post('halaman');
            $up['link_url']         = $this->input->post('link');
            $up['position']         = $this->input->post('posisi');
            $up['new_tab']          = $this->input->post('status');

            $id['sub_hal_id']       =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_sub_halaman",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_sub_halaman",$up,$id);
            }else{
                $this->app_model->insertData("tbl_sub_halaman",$up);
            }
            redirect('sub_halaman');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_sub_halaman";
            $d['judul_halaman']="Edit Sub Halaman";
            $d['judul_keterangan']="Edit Sub Halaman aplikasi";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_sub_halaman WHERE sub_hal_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->sub_hal_id;
                    $d['name']		= $db->sub_hal_name;
                    $d['isi']	    = $db->sub_hal_isi;
                    $d['halaman']	= $db->hal_id;
                    $d['link']	    = $db->link_url;
                    $d['posisi']	= $db->position;
                    $d['status']	= $db->new_tab;
                }
            }else{
                $d['name']	    = '';
                $d['isi']	    = '';
                $d['halaman']   = '';
                $d['link']      = '';
                $d['posisi']    = '';
                $d['status']    = '';
            }

            $text = "SELECT * FROM tbl_halaman ORDER BY hal_name ASC";
            $d['l_halaman'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/sub_halaman/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_sub_halaman WHERE sub_hal_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."sub_halaman'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */