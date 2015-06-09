<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topik extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom and Aditya Nursyahbani,S.SI
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman WP
     **/

    function __construct()
    {
        session_start(); //mengadakan session
        parent::__construct();
//        $this->load->model('m_captcha');
        $this->load->helper('captcha');
		$this->load->library('pagination');
    }

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']                 ="list_topik";
            $d['judul_halaman']         = "Daftar Topik";
            $d['judul_keterangan']      = "Daftar seluruh Topik";

            $d['all_topik']	            = $this->app_model->get_all_topik();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/topik/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function tambah() {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']             ="tambah_topik";
            $d['judul_halaman']     = "Tambah TOPIK";
            $d['judul_keterangan']  = "Tambah data Topik";

            $d['code']      = '';
            $d['title']     = '';
            $d['kategori']  = '';
            $d['ck']        = '';
            $d['foto']      = '';

            $text = "SELECT * FROM tbl_katpos ORDER BY katpos_name ASC";
            $d['l_katpos'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/topik/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $nama = $this->app_model->CariUserPengguna();
            $time = gmdate("Y-m-d H:i:s", time()+60*60*7);

            $up['username']         = $nama;
            $up['post_time']        = $time;
            $up['topik_title']      = $this->input->post('title');
            $up['katpos_id']      = $this->input->post('kategori');
            $up['topik_post']       = $this->input->post('topik');

            $id['topik_id']       = $this->input->post('code');

            $kode = $this->app_model->MaxKodeTopik();

            $up['topik_code'] = $kode;

            $data = $this->app_model->getSelectedData("tbl_topik",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_topik",$up,$id);
            }else{
                $this->app_model->insertData("tbl_topik",$up);
            }
            redirect('topik');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['judul']='edit_topik';
            $d['judul_halaman']='Edit TOPIK';
            $d['judul_keterangan']="Edit data Topik";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_topik WHERE topik_id='$id'";
            $data = $this->app_model->manualQuery($text);

            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['code']	    = $db->topik_id;
                    $d['title']     = $db->topik_title;
                    $d['kategori']  = $db->katpos_id;
                    $d['topik']     = $db->topik_post;

                }
            }else{
                $d['title']		    = '';
                $d['kategori']      = '';
                $d['topik']         = '';
            }

            $text = "SELECT * FROM tbl_katpos ORDER BY katpos_name ASC";
            $d['l_katpos'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/topik/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function detail($offset=0){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='detail_topik';
            $d['judul_halaman']='Detail Topik';
            $d['judul_keterangan']  = "Tampil data detail Topik";

            $id = $this->uri->segment(3);
            $offset = $this->uri->segment(4);
            $per_page = 5;

            // config pagination
            $config = array();
            $config["base_url"] = base_url() . "index.php/topik/detail/$id";
            $config["total_rows"] = $this->app_model->get_all_topik_reply_count();;
            $config["per_page"] = $per_page;
            $config['use_page_numbers'] = TRUE;
            $config['uri_segment'] = 4;
            $config['num_links'] = 5;

            $this->pagination->initialize($config);

            $d['links'] = $this->pagination->create_links();
            $d['all_topik_reply'] = $this->app_model->get_all_topik_reply($per_page, $offset);

            $text = "SELECT tbl_topik.topik_id,tbl_topik.topik_code,tbl_topik.topik_title,tbl_topik.kategori_id,tbl_topik.topik_post,tbl_topik.topik_image,
                    tbl_topik.post_time,tbl_topik.username,tbl_admin.nama_lengkap,tbl_admin.foto,tbl_admin.email,tbl_admin.hp
                    FROM tbl_topik LEFT JOIN tbl_admin ON tbl_topik.username = tbl_admin.username WHERE tbl_topik.topik_id='$id'";
            $data = $this->app_model->manualQuery($text);

            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['code']		    =$id;
                    $d['title']		    =$db->topik_title;
                    $d['topik']		    =$db->topik_post;
                    $d['image']		    =$db->topik_image;
                    $d['time']	        =$db->post_time;
                    $d['username']	    =$db->nama_lengkap;
                    $d['userfoto']	    =$db->foto;
                    $d['userhp']	    =$db->hp;
                    $d['useremail']	    =$db->email;
                }
            }else{

                $d['code']		    = $id;
                $d['title']		    = '';
                $d['topik']		    = '';
                $d['image']		    = '';
                $d['time']	        = '';
                $d['username']	    = '';
            }
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            #echo '<pre>'; print_r($d); exit;

            $d['content']= $this->load->view('admin/forum/topik_detail',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function post_reply() {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']         ="tambah_topik__post_reply";
            $d['judul_halaman'] = "Post Reply";
            $d['judul_keterangan']  = "Form Balas Topik";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_topik WHERE tbl_topik.topik_id='$id'";
            $data = $this->app_model->manualQuery($text);

            foreach($data->result() as $db){

            $d['code']      = $id;
            $d['title']     = $db->topik_title;
            $d['post']      = '';

            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/forum/topik_post_reply',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function simpan_reply (){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $nama = $this->app_model->CariUserPengguna();
            $time = gmdate("Y-m-d H:i:s", time()+60*60*7);
            $id = $this->uri->segment(3);

            $up['username']	    = $nama;
            $up['reply_code']   = $this->input->post('code');
            $up['reply_title']	= $this->input->post('title');
            $up['reply_post']	= $this->input->post('post');
            $up['reply_time']   = $time;


            $this->app_model->insertData("tbl_topik_reply",$up);

            redirect('topik');

        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_topik WHERE topik_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/topik'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file stkk.php */
/* Location: ./application/controllers/stkk.php */