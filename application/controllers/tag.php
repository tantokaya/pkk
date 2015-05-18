<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends CI_Controller {

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
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_tag';
            $d['judul_halaman']='Daftar TAG / LABEL';
            $d['judul_keterangan']="Daftar data Tag Berita";

            $d['all_tag']	    = $this->app_model->get_all_tag();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/tag/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_tag';
            $d['judul_halaman']='Tambah TAG';
            $d['judul_keterangan']="Tambah data TAG Berita";

            $d['kode']      = '';
            $d['name']      = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/tag/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $tag_seo = seo_title($this->input->post('name'));
            $up['tag_name']     = $this->input->post('name');
            $up['tag_seo']      = $tag_seo;

            $id['tag_id']   =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_tag",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_tag",$up,$id);
            }else{
                $this->app_model->insertData("tbl_tag",$up);
            }
            redirect('tag');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_tag";
            $d['judul_halaman']="Edit TAG";
            $d['judul_keterangan']="Edit TAG Berita";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_tag WHERE tag_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->tag_id;
                    $d['name']		= $db->tag_name;
                }
            }else{
                $d['name']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/tag/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_tag WHERE tag_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."tag'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */