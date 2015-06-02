<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends CI_Controller {

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

            $d['judul']='list_slide';
            $d['judul_halaman']='Daftar SLIDE';
            $d['judul_keterangan']="Daftar data Slide Gambar Depan";

            $d['all_slide']	    = $this->app_model->get_all_slide();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/slide/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_slide';
            $d['judul_halaman']='Tambah SLIDE';
            $d['judul_keterangan']="Tambah data Slide Gambar";

            $d['kode']      = '';
            $d['judul']     = '';
            $d['isi']       = '';
            $d['image']     = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/slide/form',$d,true);
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
            $image_seo  = seo_title($this->input->post('judul'));

            $up['username']	     = $nama;
            $up['slide_date']    = $tanggal;
            $up['slide_time']    = $time;
            $up['slide_judul']   = $this->input->post('judul');
            $up['slide_isi']     = $this->input->post('isi');

            $id['slide_id']      =   $this->input->post('kode');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path']      = './uploads/slide/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['file_name']        = $image_seo;
                //$config['max_size']	    = '1024';
                //$config['max_width']      = '1024';
                //$config['max_height']     = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload())
                {
                    /*$error = array('error' => $this->upload->display_errors());
                    print_r($error); exit();*/
                    //redirect('slide');
                }
                else
                {
                    //Image Resizing
                    $data_upload = $this->upload->data();

                    $file_name = $data_upload["file_name"];

                    $this->load->library('image_lib');
                    $config_resize['image_library'] = 'gd2';
                    $config_resize['create_thumb'] = FALSE;
                    $config_resize['maintain_ratio'] = TRUE;
                    $config_resize['new_image'] = './uploads/slide/thumbs';
                    $config_resize['master_dim'] = 'height';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './uploads/slide/'. $file_name;

                    $config_resize['width'] = 1;
                    $config_resize['height'] = 270;
                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $pp = array('upload_data' => $this->upload->data());
                }

                $up['slide_image'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_slide",$id);
            if($data->num_rows()>0){
                $result = $data->row_array();
                
                $this->app_model->updateData("tbl_slide",$up,$id);
                $old_dir = './uploads/slide/';
                $old_thumbs    = './uploads/slide/thumbs/';
                if(file_exists($old_dir . $result['slide_image'])){
                    unlink($old_dir . $result['slide_image']);
                    unlink($old_thumbs . $result['slide_image']);
                }
            }else{
                $this->app_model->insertData("tbl_slide",$up);

            }
            redirect('slide');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_slide";
            $d['judul_halaman']="Edit SLIDE";
            $d['judul_keterangan']="Edit Slide Gambar";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_slide WHERE slide_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->slide_id;
                    $d['judul']		= $db->slide_judul;
                    $d['isi']	    = $db->slide_isi;
                    $d['image']	    = $db->slide_image;
                }
            }else{
                $d['judul']	    = '';
                $d['isi']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/slide/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $text = "SELECT slide_id, slide_image FROM tbl_slide WHERE slide_id = '$id'";
            $data = $this->app_model->manualQuery($text);
            $album_image = $data->row_array();

            $old_dir = './uploads/slide/';
            unlink($old_dir . $album_image['slide_image']);

            $this->app_model->manualQuery("DELETE FROM tbl_slide WHERE slide_id='$id'");
            redirect('slide');
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file slide.php */
/* Location: ./application/controllers/slide.php */