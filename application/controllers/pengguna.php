<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman pengguna
     **/

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']="list_pengguna";
            $d['judul_halaman']="Daftar Pengguna";
            $d['judul_keterangan']="Daftar seluruh pengguna aplikasi";

            $text = "SELECT * FROM tbl_admin ORDER BY username ASC";
            $d['data'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/pengguna/view', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function tambah()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['judul']="add_pengguna";
            $d['judul_halaman'] = "Tambah Pengguna";
            $d['judul_keterangan']="Tambah seluruh pengguna aplikasi";

            $d['username']		= '';
            $d['nama_lengkap']	= '';
            $d['pwd']			= '';
            $d['level']			= '';
            $d['hp']            = '';
            $d['email']         = '';
            $d['foto']          = '';

            $text = "SELECT tbl_level.id_level,tbl_level.`level` FROM tbl_level";
            $d['l_level'] = $this->app_model->manualQuery($text);

            $d['content'] = $this->load->view('admin/pengguna/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_pengguna";
            $d['judul_halaman']="Edit Pengguna";
            $d['judul_keterangan']="Edit seluruh pengguna aplikasi";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_admin WHERE username='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['username']		=$id;
                    $d['nama_lengkap']	=$db->nama_lengkap;
                    $d['pwd']	        ='';
                    $d['level']			=$db->id_level;
                    $d['hp']            = $db->hp;
                    $d['email']         = $db->email;
                    $d['foto']          = $db->foto;
                }
            }else{
                $d['username']		= $id;
                $d['nama_lengkap']	= '';
                $d['pwd']	        = '';
                $d['level']			= '';
                $d['hp']            = '';
                $d['email']         = '';
                $d['foto']          = '';
            }

            $text = "SELECT tbl_level.id_level,tbl_level.`level` FROM tbl_level";
            $d['l_level'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/pengguna/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan()
    {

        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $pwd 	= $this->input->post('pwd');
            $nama 	= $this->input->post('nama_lengkap');
            $level	= $this->input->post('level');
            $user	= mysql_real_escape_string($this->input->post('username'));

            $up['username']		= $user;
            $up['nama_lengkap']	= $nama;
            $up['password']		= md5($pwd);
            $up['id_level']	= $level;
            $up['hp']       = $this->input->post('hp');
            $up['email']    = $this->input->post('email');


            $id['username']=$this->input->post('username');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path'] = './uploads/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
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

                $up['foto'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_admin",$id);
            if($data->num_rows()>0){
                if(empty($pwd)){
                    $this->app_model->manualQuery("UPDATE tbl_admin SET nama_lengkap='$nama',id_level='$level', foto='$up[foto]' WHERE username='$user'");

                    $result = $data->row_array();
                    // print_r($result); exit();

                    // hapus image lama
                    $old_dir = './uploads/profile/';
                    if(file_exists($old_dir . $result['foto'])){

                        unlink($old_dir . $result['foto']);
                    }
                }else{
                    $this->app_model->updateData("tbl_admin",$up,$id);
                }

            }else{
                $this->app_model->insertData("tbl_admin",$up);

            }
            redirect('pengguna');

        }else{
            header('location:'.base_url());
        }

    }
    public function hapus()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);

            //cek file upload
            $data = $this->app_model->getSelectedData('tbl_admin', array('username' => $id));
            if($data->num_rows() > 0 )
            {
                $result = $data->row_array();
                // hapus image lama
                $old_dir = '../../uploads/profile/';
                if(file_exists($old_dir . $result['foto'])){
                    unlink($old_dir . $result['foto']);
                }
            }
            $this->app_model->manualQuery("DELETE FROM tbl_admin WHERE username='$id'");
//            echo "<meta http-equiv='refresh' content='0; url=".base_url()."pengguna'>";
            redirect('pengguna');
        }else{
            header('location:'.base_url());
        }
    }

}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */