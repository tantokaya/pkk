<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeri_foto extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='list_gfoto';
            $d['judul_halaman']='Daftar GALERI FOTO';
            $d['judul_keterangan']="Daftar data Galeri Foto";

            $d['all_galeri']	    = $this->app_model->get_all_galeri_foto();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/gfoto/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_gfoto';
            $d['judul_halaman']='Tambah GALERI FOTO';
            $d['judul_keterangan']="Tambah data Galeri Foto";

            $d['kode']      = '';
            $d['judul']     = '';
            $d['status']    = '';
            $d['foto']      = '';
            $d['album']     = '';

            $text = "SELECT * FROM tbl_album ORDER BY album_name ASC";
            $d['l_album'] = $this->app_model->manualQuery($text);
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/gfoto/form',$d,true);
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

            $up['gfoto_date']    = $tanggal;
            $up['gfoto_time']    = $time;
            $up['gfoto_name']    = $this->input->post('judul');
            $up['status']        = $this->input->post('status');
            $up['album_id']      = $this->input->post('album');

            $id['gfoto_id']      =   $this->input->post('kode');

            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path'] = './uploads/galeri_foto/';
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

                $up['gfoto_image'] = $pp['upload_data']['file_name'];

            }

            //print_r($up); exit();


            $data = $this->app_model->getSelectedData("tbl_galeri_foto",$id);
            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_galeri_foto",$up,$id);
                $old_dir = './uploads/galeri_foto/';
                if(file_exists($old_dir . $result['foto'])){
                    unlink($old_dir . $result['foto']);
                }
            }else{
                $this->app_model->insertData("tbl_galeri_foto",$up);

            }
            redirect('galeri_foto');
        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_gfoto";
            $d['judul_halaman']="Edit GALERI FOTO";
            $d['judul_keterangan']="Edit data Galeri Foto";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_galeri_foto WHERE gfoto_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['kode']      = $db->gfoto_id;
                    $d['judul']		= $db->gfoto_name;
                    $d['album']		= $db->album_id;
                    $d['status']	= $db->status;
//                    $d['foto']	    = $db->album_image;
                }
            }else{
                $d['judul']	    = '';
                $d['album']	    = '';
                $d['status']	= '';
            }

            $text = "SELECT * FROM tbl_album ORDER BY album_name ASC";
            $d['l_album'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/gfoto/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $text = "SELECT gfoto_id, gfoto_image FROM tbl_galeri_foto WHERE gfoto_id = '$id'";
            $data = $this->app_model->manualQuery($text);
            $gfoto_image = $data->row_array();

            $old_dir = './uploads/galeri_foto/';
            unlink($old_dir . $gfoto_image['gfoto_image']);

            $this->app_model->manualQuery("DELETE FROM tbl_galeri_foto WHERE gfoto_id='$id'");
            redirect('galeri_foto');
        }else{
            header('location:'.base_url());
        }
    }
}

/* End of file halaman.php */
/* Location: ./application/controllers/halaman.php */