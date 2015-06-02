<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widget extends CI_Controller {

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

            $d['judul']='list_widget';
            $d['judul_halaman']='Daftar WIDGET';
            $d['judul_keterangan']="Daftar data Widget";

            $d['all_widget']	    = $this->widget_model->get_all_widget();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();


            $d['content']= $this->load->view('admin/widget/view',$d,true);
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

            $up['widget_tgl']     = $tanggal;
            $up['widget_time']    = $time;
            $up['widget_name']      = $this->input->post('name');
            $up['widget_judul']     = $this->input->post('judul');
            $up['widget_judul_isi'] = $this->input->post('judul_isi');
            $up['widget_isi']       = $this->input->post('isi');

            $id['widget_id']   =   $this->input->post('kode');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path']      = './uploads/widget/';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['file_name']        = $this->input->post('judul');;
                //$config['max_size']	    = '1024';
                //$config['max_width']      = '1024';
                //$config['max_height']     = '768';

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
                    $config_resize['new_image'] = './uploads/widget/thumbs';
                    $config_resize['master_dim'] = 'height';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './uploads/widget/'. $file_name;

                    $config_resize['width'] = 120;
                    $config_resize['height'] = 90;
                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();

                    $pp = array('upload_data' => $this->upload->data());
                }

                $up['widget_image'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_widget",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_widget",$up,$id);
                $old_dir = './uploads/widget/';
                if(file_exists($old_dir . $result['image'])){
                    unlink($old_dir . $result['image']);
                }
            }else{
                $this->app_model->insertData("tbl_widget",$up);

            }
            redirect('widget');
        }else{
            header('location:'.base_url());
        }
    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_widget";
            $d['judul_halaman']="Edit WIDGET";
            $d['judul_keterangan']="Edit Widget";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_widget WHERE widget_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->widget_id;
                    $d['name']      = $db->widget_name;
                    $d['judul']		= $db->widget_judul;
                    $d['judul_isi']	= $db->widget_judul_isi;
                    $d['isi']	    = $db->widget_isi;
                    $d['image']	    = $db->widget_image;
                }
            }else{
                $d['name']	    = '';
                $d['judul']	    = '';
                $d['judul_isi']	= '';
                $d['isi']	    = '';
                $d['image']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/widget/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function detail()
    {
        $d['all_hot']	            = $this->app_model->get_all_hot();
        $d['all_new_post']	        = $this->app_model->get_all_new_post();
        $d['all_post_by_widget']    = $this->widget_model->get_all_post_by_widget();
        $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
        $d['all_post_by_w_1_1']	    = $this->widget_model->get_all_post_by_w_1_1();
        $d['all_post_by_w_1_2']	    = $this->widget_model->get_all_post_by_w_1_2();

        $d['jumlah_pengunjung'] = $this->statistik_model->pengunjung();

        $d['content']= $this->load->view('widget',$d,true);
        $this->load->view('home',$d);
    }


}

/* End of file sensor.php */
/* Location: ./application/controllers/sensor.php */