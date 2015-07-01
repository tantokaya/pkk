<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

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

            $d['judul']='list_post';
            $d['judul_halaman']='Daftar POST';
            $d['judul_keterangan']="Daftar data POST Berita";

            $d['all_post']	            = $this->app_model->get_all_post();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/post/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }

    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_post';
            $d['judul_halaman']='Tambah POST';
            $d['judul_keterangan']="Tambah data Post";

            $d['kode']          = '';
            $d['judul']         = '';
            $d['kategori']      = '';
            $d['isi']           = '';
            $d['foto']          = '';
            $d['title']         = '';
            $d['desc']          = '';
            $d['keywords']      = '';
            $d['status']        = '';

            $text = "SELECT * FROM tbl_kategori ORDER BY kategori ASC";
            $d['l_kategori'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/post/form',$d,true);
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
            $publish = 'N';
            $tag_seo = $this->input->post('tag_seo');
            $tag=implode(',',$tag_seo);
            $judul_seo      = seo_title($this->input->post('judul'));

            $up['username']	     = $nama;
            $up['post_tgl']      = $tanggal;
            $up['post_time']     = $time;
            $up['post_judul']    = $this->input->post('judul');
            $up['post_judul_seo']= $judul_seo;
            $up['kategori_id']   = $this->input->post('kategori');
            $up['post_isi']      = $this->input->post('isi');
            $up['seo_title']     = $this->input->post('title');
            $up['seo_desc']      = $this->input->post('desc');
            $up['seo_keywords']  = $this->input->post('keywords');
            $up['post_tag']      = $tag;

            if($this->session->userdata('id_level')=='01'){
                $up['publish']       = $this->input->post('status');
            } else {
                $up['publish']       = $publish;
            }


            $id['post_id']   =   $this->input->post('kode');

            
            // cek jika ada file yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                // upload
                $config['upload_path']   = './uploads/post/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name']     = $judul_seo;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload())
                {
                   redirect('404');
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
                    $config_resize['new_image'] = './uploads/post/thumbs/'.$file_name;
                    $config_resize['master_dim'] = 'height';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './uploads/post/'. $file_name;

                    $config_resize['width'] = 300;
                    $config_resize['height'] = 200;
                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();
                    
                  

                    $pp = array('upload_data' => $this->upload->data());
                }

                $up['post_gambar'] = $pp['upload_data']['file_name'];
                

            }
            
            
            
            //print_r($up); exit();
            
            // slider upload
            $slide_data = $this->do_upload($judul_seo);
            #echo $slide_data['uploads']['filename']; exit;
            #echo count($slide_data['uploads']);
            #echo '<pre>'; print_r($slide_data); exit;
            
            $z = 1;
            foreach ($slide_data['uploads'] as $rs){
                $up['slide_post'.$z] = $rs['file_name'];
                
                // resize image

                    $file_name = $rs["file_name"];

                    $this->load->library('image_lib');
                    $config_resize['image_library'] = 'gd2';
                    $config_resize['create_thumb'] = FALSE;
                    $config_resize['maintain_ratio'] = FALSE;
                    $config_resize['new_image'] = './uploads/post/thumbs/'.$file_name;
                    $config_resize['master_dim'] = 'height';
                    $config_resize['quality'] = "100%";
                    $config_resize['source_image'] = './uploads/post/'. $file_name;

                    $config_resize['width'] = 600;
                    $config_resize['height'] = 429;
                    $this->image_lib->initialize($config_resize);
                    $this->image_lib->resize();
                    
                    unlink($config_resize['source_image']);
                    
                $z++;
            }
            
            #echo '<pre>'; print_r($up); exit;

            $data = $this->app_model->getSelectedData("tbl_post",$id);
            if($data->num_rows()>0){
                    $this->app_model->updateData("tbl_post",$up,$id);
                    $old_dir = './uploads/post/';
                    if(file_exists($old_dir . $result['foto'])){
                        unlink($old_dir . $result['foto']);
                    }

            }else{
                $this->app_model->insertData("tbl_post",$up);
                $jml=count($tag_seo);
                for($i=0;$i<$jml;$i++){
                    mysql_query("UPDATE tbl_tag SET count=count+1 WHERE tag_seo='$tag_seo[$i]'");
                }

            }



            redirect('post');

        }else{
            header('location:'.base_url());
        }

    }

    public function edit()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul'] = "edit_post";
            $d['judul_halaman']="Edit POST";
            $d['judul_keterangan']="Edit Post Berita";

            $id = $this->uri->segment(3);

            $tampil=mysql_query("SELECT * FROM tbl_post WHERE post_id='$id'");
            while($r=mysql_fetch_array($tampil)){
                $datatag = GetCheckboxes('tbl_tag', 'tag_seo', 'tag_name', $r['post_tag']);

            }

            $text = "SELECT * FROM tbl_post WHERE post_id='$id'";
            $data = $this->app_model->manualQuery($text);
            if($data->num_rows() > 0){
                foreach($data->result() as $db){

                    $d['kode']      = $db->post_id;
                    $d['judul']		= $db->post_judul;
                    $d['isi']		= $db->post_isi;
                    $d['kategori']  = $db->kategori_id;
                    $d['foto']      = $db->post_gambar;
                    $d['title']     = $db->seo_title;
                    $d['desc']      = $db->seo_desc;
                    $d['keywords']  = $db->seo_keywords;
                    $d['status']    = $db->publish;
                    $d['tag']       = $datatag;
                 }
            }else{
                $d['judul']	    = '';
                $d['kategori']	= '';
                $d['title']	    = '';
                $d['desc']	    = '';
                $d['keywords']	= '';
                $d['status']	= '';
                $d['tag']	    = '';
            }

            $text = "SELECT * FROM tbl_kategori ORDER BY kategori ASC";
            $d['l_kategori'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content'] = $this->load->view('admin/post/form', $d, true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $text = "SELECT post_id, post_gambar FROM tbl_post WHERE post_id = '$id'";
            $data = $this->app_model->manualQuery($text);
            $post_image = $data->row_array();

            $old_dir = './uploads/post/';
            unlink($old_dir . $post_image['post_gambar']);

            $this->app_model->manualQuery("DELETE FROM tbl_post WHERE post_id='$id'");
            redirect('post');
        }else{
            header('location:'.base_url());
        }
    }

    public function DataTag()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $tampil=mysql_query("SELECT * FROM tbl_tag");
            while($r=mysql_fetch_array($tampil)){
                echo "<input type=checkbox value='$r[tag_seo]'  name='tag_seo[]'> $r[tag_name] ";
            }
        }else{
            header('location:'.base_url());
        }
    }
    
    public function baca()
    {
        $post_id = $this->input->post('post_id');

        if(!empty($post_id))
        {
            $text = "UPDATE tbl_post SET dibaca = dibaca+1 WHERE post_id = '$post_id'";
            $data = $this->app_model->manualQuery($text);
        }
    }

    // qqfileuploader
    public function upload()
    {
        $method=$this->input->server('REQUEST_METHOD');
        if(strtolower($method)=="post"){

            $this->load->library('QQFileUploader');

            // target upload directory
            $folder="./uploads/temp/";

            //array("jpg","jpeg","gif","exe","mov" and etc...
            $allowedExtensions = array("jpg", "jpeg", "gif", "png");
            $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
            $uploader = new QQFileUploader($allowedExtensions, $sizeLimit);

            $result = $uploader->handleUpload($folder);

            $data=array(
                'lampiran_nama'=>$result['filename'],
                'lampiran_size'=>$result['size'],
                'lampiran_ext'=>$result['ext']
            );

            $id=$this->app_model->insert_lampiran($data);
            //idlampiran nanti ditaruh di id untuk hidden field
            $result['idlampiran']=$id;
            $return = json_encode($result);
            echo $return;
        }else{
            header("HTTP/1.1 403 Forbidden");
            echo "Not Allowed";
        }
    }

    // hapus lampiran
    function delete_lampiran()
    {
        $lampId =  $this->input->post('lampiran_id');

        // get filename
        $lampiran = $this->app_model->get_lampiran_by_id($lampId);
        // hapus file existing
        $dir = './uploads/';
        if(file_exists($dir . $lampiran->lampiran_nama)){
            unlink($dir . $lampiran->lampiran_nama);
        }

        $this->app_model->hapus_lampiran($lampId);
        $query = $this->app_model->hapus_lampiran_post($lampId);

        $status = "false";
        if ($this->db->affected_rows() > 0){
            $status = "true";
        }
        echo $status;
    }
    
    public function do_upload($title) {
            if($this->input->post()) {
                $num_of_files = sizeof($_FILES['slide']['tmp_name']);
                $files = $_FILES['slide'];
                $errors = array();
                
                for($i=0;$i<$num_of_files;$i++) {
                    if($_FILES['slide']['error'][$i] != 0) 
                        $errors[$i][] = 'Tidak dapat upload file '.$_FILES['slide']['name'][$i];
                }
                
                if(sizeof($errors)==0) {
                    $this->load->library('upload');
                    $config['upload_path'] = FCPATH . 'uploads/post/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    
                    for ($i = 0; $i < $num_of_files; $i++) {
                        $_FILES['slide']['name'] = $files['name'][$i];
                        $_FILES['slide']['type'] = $files['type'][$i];
                        $_FILES['slide']['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES['slide']['error'] = $files['error'][$i];
                        $_FILES['slide']['size'] = $files['size'][$i];
                        
                        $config['file_name'] = $title;
                        
                        $this->upload->initialize($config);
                    
                        if ($this->upload->do_upload('slide')) {
                            $data['uploads'][$i] = $this->upload->data();
                        } else {
                            $data['upload_errors'][$i] = $this->upload->display_errors();
                        }
                       
                    }
                } else {
                  print_r($errors);
                }
             }
             //echo '<pre>';             
             //print_r($data);
             return $data;
        }

}

/* End of file post.php */
/* Location: ./application/controllers/post.php */