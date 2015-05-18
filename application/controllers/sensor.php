<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sensor extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_sensor';
            $d['judul_halaman']='Daftar SENSOR';
            $d['judul_keterangan']="Daftar data Sensor Kata";

            $d['all_sensor']	    = $this->app_model->get_all_sensor();

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/sensor/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_sensor';
            $d['judul_halaman']='Tambah SENSOR';
            $d['judul_keterangan']="Tambah data Sensor Kata";

            $d['kode']      = '';
            $d['name']      = '';
            $d['ganti']     = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/sensor/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $up['sensor_name']     = $this->input->post('name');
            $up['sensor_ganti']     = $this->input->post('ganti');

            $id['sensor_id']   =   $this->input->post('kode');

            $data = $this->app_model->getSelectedData("tbl_sensor",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_sensor",$up,$id);
            }else{
                $this->app_model->insertData("tbl_sensor",$up);
            }
            redirect('sensor');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_sensor";
            $d['judul_halaman']="Edit SENSOR";
            $d['judul_keterangan']="Edit Sensor Kata";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_sensor WHERE sensor_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->sensor_id;
                    $d['name']		= $db->sensor_name;
                    $d['ganti']		= $db->sensor_ganti;
                }
            }else{
                $d['name']	    = '';
                $d['ganti']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/sensor/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_sensor WHERE sensor_id='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."sensor'>";
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file sensor.php */
/* Location: ./application/controllers/sensor.php */