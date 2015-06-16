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

            $up['pertanyaan']   = $this->input->post('pertanyaan');
            $up['jawaban1']     = $this->input->post('jawaban1');
            $up['jawaban2']     = $this->input->post('jawaban2');
            $up['jawaban3']     = $this->input->post('jawaban3');
            $up['jawaban4']     = $this->input->post('jawaban4');
            $up['jawaban5']     = $this->input->post('jawaban5');
            $up['publish']      = $this->input->post('status');

            $id['id']           =   $this->input->post('kode');


            $data = $this->app_model->getSelectedData("tbl_polling",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_polling",$up,$id);
            }else{
                $this->app_model->insertData("tbl_polling",$up);
            }
            redirect('pooling');
        }else{
            header('location:'.base_url());
        }
    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_pooling";
            $d['judul_halaman']="Edit Pooling";
            $d['judul_keterangan']="Edit Menu Pooling";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_polling WHERE id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->id;
                    $d['pertanyaan']= $db->pertanyaan;
                    $d['jawaban1']	= $db->jawaban1;
                    $d['jawaban2']	= $db->jawaban2;
                    $d['jawaban3']	= $db->jawaban3;
                    $d['jawaban4']	= $db->jawaban4;
                    $d['jawaban5']	= $db->jawaban5;
                    $d['status']	= $db->publish;
                }
            }else{
                $d['pertanyaan']	= '';
                $d['jawaban1']	    = '';
                $d['jawaban2']	    = '';
                $d['jawaban3']	    = '';
                $d['jawaban4']	    = '';
                $d['jawaban5']	    = '';
                $d['status']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/pooling/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }


}

/* End of file sensor.php */
/* Location: ./application/controllers/sensor.php */