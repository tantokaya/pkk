<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_panel';
            $d['judul_halaman']='Daftar PANEL APLIKASI';
            $d['judul_keterangan']="Daftar data Panel Aplikasi";

            $d['all_panel']	    = $this->widget_model->get_all_panel();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/panel/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }


    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['panel_isi']        = $this->input->post('isi');

            $id['panel_id']   =   $this->input->post('kode');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path'] = './uploads/panel/';
                $config['allowed_types'] = 'gif|jpg|png|ico';
                //$config['max_size']	= '1024';
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload())
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error); exit();
                }
                else
                {
                    $pp = array('upload_data' => $this->upload->data());
                }

                $up['panel_image'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_panel",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_panel",$up,$id);
                $old_dir = './uploads/panel/';
                if(file_exists($old_dir . $result['image'])){
                    unlink($old_dir . $result['image']);
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

            $d['content'] = $this->load->view('admin/panel/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }


}

/* End of file sensor.php */
/* Location: ./application/controllers/sensor.php */