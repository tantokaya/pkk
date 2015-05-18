<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/


    function __construct(){
        parent::__construct();
        $this->load->helper('permalink_helper');
        $this->load->library('pagination');
    }

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_kategori';
            $d['judul_halaman']='Daftar Kategori';
            $d['judul_keterangan']="Daftar data Kategori Berita";

            $d['all_kategori']	    = $this->app_model->get_all_kategori();

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/kategori/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_kategori';
            $d['judul_halaman']='Tambah KATEGORI';
            $d['judul_keterangan']="Tambah data Kategori";

            $d['kode']      = '';
            $d['name']      = '';

            $text = "SELECT * FROM tbl_widget ORDER BY widget_name ASC";
            $d['l_widget'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/kategori/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['kategori']     = $this->input->post('name');
            $up['widget_id']    = $this->input->post('widget');

            $id['kategori_id']   =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_kategori",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_kategori",$up,$id);
            }else{
                $this->app_model->insertData("tbl_kategori",$up);
            }
            redirect('kategori');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_kategori";
            $d['judul_halaman']="Edit KATEGORI";
            $d['judul_keterangan']="Edit Kategori Berita";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_kategori WHERE kategori_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->kategori_id;
                    $d['name']		= $db->kategori;
                    $d['widget']	= $db->widget_id;
                }
            }else{
                $d['name']	        = '';
                $d['widget']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $text = "SELECT * FROM tbl_widget ORDER BY widget_name ASC";
            $d['l_widget'] = $this->app_model->manualQuery($text);

            $d['content'] = $this->load->view('admin/kategori/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_kategori WHERE kategori_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."kategori'>";
        }else{
            header('location:'.base_url());
        }
    }

   public function detail($offset=0)
    {
        $post_id = $this->uri->segment(3);
        $title = $this->uri->segment(4);
        $offset = $this->uri->segment(5);
        $per_page = 7;

        // config pagination
        $config = array();
        $config["base_url"] = base_url() . "kategori/detail/$post_id/$title";
        $config["total_rows"] = $this->post_model->get_all_post_in_kategori_count();;
        $config["per_page"] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 5;
        $config['num_links'] = 5;

        $this->pagination->initialize($config);

        $d['links'] = $this->pagination->create_links();
        $d['all_post_in_kategori'] = $this->post_model->get_all_post_in_kategori($per_page, $offset);


        $d['all_hot']	            = $this->app_model->get_all_hot();
        $d['all_new_post']	        = $this->app_model->get_all_new_post();
        $d['all_post_by_kategori']	= $this->app_model->get_all_post_by_kategori();
        $d['all_post_by_w_1_1']	    = $this->widget_model->get_all_post_by_w_1_1();
        $d['all_post_by_w_1_2']	    = $this->widget_model->get_all_post_by_w_1_2();
        $d['keywords']              = $this->post_model->CariKategoriByKeywords();
        $d['title']                 = $this->post_model->CariKategoriByTitle();
        $d['title_aplikasi']        = $this->config->item('nama_aplikasi');
        $d['descriptions']          = "";

       // $d['all_post_in_kategori']	= $this->post_model->get_all_post_in_kategori();


        $d['all_post_by_detail']	= $this->app_model->get_all_post_by_detail();
        $d['all_new_post_baca']	    = $this->app_model->get_all_new_post_baca();

        $d['jumlah_pengunjung'] = $this->statistik_model->pengunjung();



        $d['content']= $this->load->view('kategori',$d,true);
        $this->load->view('home',$d);
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */