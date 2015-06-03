<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pooling extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
    }

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']                 = 'list_pooling';
            $d['judul_halaman']         = 'Daftar Pooling';
            $d['judul_keterangan']      = "Daftar data Pooling Aplikasi";

            $d['all_pooling']	        = $this->widget_model->get_all_pooling();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/pooling/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }


    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['panel_alamat']        = $this->input->post('alamat');
            $up['panel_copyright']     = $this->input->post('copyright');
            $up['panel_facebook']      = $this->input->post('facebook');
            $up['panel_twitter']       = $this->input->post('twitter');

            $id['panel_id']   =   $this->input->post('kode');


            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload

                $config['upload_path'] = './uploads/panel/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = 'logo';
                //$config['max_size']	= '1024';
                //$config['max_width']  = '4096';
                //$config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload())
                {
                    $error = array('error' => $this->upload->display_errors());
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
                    $config_resize['maintain_ratio'] = FALSE;
                    $config_resize['new_image'] = './uploads/panel/thumbs';
                    $config_resize['master_dim'] = 'height';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './uploads/panel/'. $file_name;

                    $config_resize['height'] = 120;
                    $config_resize['width'] = 500;
                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $pp = array('upload_data' => $this->upload->data());


                }

                $up['panel_image'] = $pp['upload_data']['file_name'];
            }



            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_panel",$id);
            if($data->num_rows()>0){
                $result = $data->row_array();

                $this->app_model->updateData("tbl_panel",$up,$id);
                $old_dir    = './uploads/panel/';
                $old_thumbs    = './uploads/panel/thumbs/';
                if(file_exists($old_dir . $result['panel_image'])){
                    unlink($old_dir . $result['panel_image']);
                    unlink($old_thumbs . $result['panel_image']);
                }
            }else{
                $this->app_model->insertData("tbl_panel",$up);

            }
            redirect('panel');
        }else{
            header('location:'.base_url());
        }
    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_panel";
            $d['judul_halaman']="Edit PANEL";
            $d['judul_keterangan']="Edit Panel Aplikasi";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_panel WHERE panel_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->panel_id;
                    $d['copyright'] = $db->panel_copyright;
                    $d['alamat']	= $db->panel_alamat;
                    $d['facebook']	= $db->panel_facebook;
                    $d['twitter']	= $db->panel_twitter;
                    $d['image']	    = $db->panel_image;
                }
            }else{
                $d['copyright']	    = '';
                $d['alamat']	    = '';
                $d['facebook']	    = '';
                $d['twitter']	    = '';
                $d['image']	        = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/panel/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }


}

/* End of file sensor.php */
/* Location: ./application/controllers/sensor.php */