<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baner extends CI_Controller {

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

            $d['judul']='list_baner';
            $d['judul_halaman']='Daftar BANER';
            $d['judul_keterangan']="Daftar data Baner Iklan";

            $d['all_baner']	    = $this->widget_model->get_all_baner();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/baner/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }


    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $image_seo  = seo_title($this->input->post('judul'));

            $up['baner_name']   = $this->input->post('name');
            $up['publish']      = $this->input->post('status');

            $id['baner_id']   =   $this->input->post('kode');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path'] = './uploads/baner/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name']        = $image_seo;
                //$config['max_size']	= '1024';
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload())
                {
                    //$error = array('error' => $this->upload->display_errors());
                    //print_r($error); exit();
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
                    $config_resize['new_image'] = './uploads/baner/thumbs';
                    $config_resize['master_dim'] = 'height';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './uploads/baner/'. $file_name;

                    $config_resize['width'] = 1;
                    $config_resize['height'] = 155;
                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $pp = array('upload_data' => $this->upload->data());
                }

                $up['baner_image'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_baner",$id);
            if($data->num_rows()>0){
                $result = $data->row_array();

                $this->app_model->updateData("tbl_baner",$up,$id);
                $old_dir = './uploads/baner/';
                $old_thumbs    = './uploads/baner/thumbs/';
                if(file_exists($old_dir . $result['baner_image'])){
                    unlink($old_dir . $result['baner_image']);
                    unlink($old_thumbs . $result['baner_image']);
                }
            }else{
                $this->app_model->insertData("tbl_baner",$up);

            }
            redirect('baner');
        }else{
            header('location:'.base_url());
        }
    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_baner";
            $d['judul_halaman']="Edit BANDER";
            $d['judul_keterangan']="Edit Bander Iklan";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_baner WHERE baner_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->baner_id;
                    $d['name']      = $db->baner_name;
                    $d['image']	    = $db->baner_image;
                    $d['status']	= $db->publish;
                }
            }else{
                $d['name']	    = '';
                $d['image']	    = '';
                $d['status']	= '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/baner/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }


}

/* End of file sensor.php */
/* Location: ./application/controllers/sensor.php */