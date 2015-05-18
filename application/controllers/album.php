<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_album';
            $d['judul_halaman']='Daftar ALBUM';
            $d['judul_keterangan']="Daftar data Album Gambar";

            $d['all_album']	    = $this->app_model->get_all_album();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/album/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_album';
            $d['judul_halaman']='Tambah ALBUM';
            $d['judul_keterangan']="Tambah data Album Gambar";

            $d['kode']      = '';
            $d['judul']     = '';
            $d['status']     = '';
            $d['foto']      = '';

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/album/form',$d,true);
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

            $up['album_date']    = $tanggal;
            $up['album_time']    = $time;
            $up['album_name']    = $this->input->post('judul');
            $up['status']        = $this->input->post('status');

            $id['album_id']      =   $this->input->post('kode');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path'] = './uploads/album/';
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

                $up['album_image'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_album",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_album",$up,$id);
                $old_dir = './uploads/album/';
                if(file_exists($old_dir . $result['foto'])){
                    unlink($old_dir . $result['foto']);
                }
            }else{
                $this->app_model->insertData("tbl_album",$up);

            }
            redirect('album');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_album";
            $d['judul_halaman']="Edit ALBUM";
            $d['judul_keterangan']="Edit Album Gambar";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_album WHERE album_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->album_id;
                    $d['judul']		= $db->album_name;
                    $d['status']	= $db->status;
//                    $d['foto']	    = $db->album_image;
                }
            }else{
                $d['judul']	    = '';
                $d['status']	    = '';
            }

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content'] = $this->load->view('admin/album/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $text = "SELECT album_id, album_image FROM tbl_album WHERE album_id = '$id'";
            $data = $this->app_model->manualQuery($text);
            $album_image = $data->row_array();

            $old_dir = './uploads/album/';
            unlink($old_dir . $album_image['album_image']);

            $this->app_model->manualQuery("DELETE FROM tbl_album WHERE album_id='$id'");


//           echo "<meta http-equiv='refresh' content='0; url=".base_url()."album'>";
            redirect('album');
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */