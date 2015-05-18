<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adpus extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/
    public function index()
    {

        $d['judul']="Admin";

        $d['username'] = array('name' => 'username',
            'id' => 'username',
            'type' => 'text',
            'class' => 'form-control',
            'placeholder' => 'Username...',
            'autocomplete' => 'off',
        );
        $d['password'] = array('name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => 'Password...',
            'autocomplete' => 'off',
        );
        $d['submit'] = array('name' => 'submit',
            'id' => 'submit',
            'type' => 'submit',
            'class' => 'btn bg-olive btn-block',
            'data-options' => 'iconCls:\'icon-lock_open\''
        );

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('admin/login_adm',$d);
        }else{
            $u = $this->input->post('username');
            $p = $this->input->post('password');
            $this->app_model->getLoginData($u,$p);
        }

    }

    public function home()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $d['judul']="dashboard";
            $d['judul_halaman']="Dashboard";
            $d['judul_keterangan']="Dashboard, Statistics and lainnya";

            $d['jumlah_pengunjung'] = $this->statistik_model->pengunjung();
            $d['jml_topik_perkenalan'] = $this->app_model->JmlTopikPerkenalan();
            $d['jml_topik_pengumuman'] = $this->app_model->JmlTopikPengumuman();
            $d['jml_topik_saran'] = $this->app_model->JmlTopikSaran();
            $d['jml_topik_pojok'] = $this->app_model->JmlTopikPojok();

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();

            $d['content']= $this->load->view('admin/dashboard_adm',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'adpus');
        }
    }

    public function logout(){
        $cek = $this->session->userdata('logged_in');
        if(empty($cek))
        {
            header('location:'.base_url().'adpus');
        }else{
            $this->session->sess_destroy();
            header('location:'.base_url().'adpus');
        }
    }

    public function DataDetail()
    {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $tampil=mysql_query("SELECT tbl_chat.id_chat,tbl_chat.`user`,tbl_chat.waktu,tbl_chat.pesan,tbl_admin.foto,tbl_admin.nama_lengkap
                FROM tbl_chat LEFT JOIN tbl_admin ON tbl_chat.`user` = tbl_admin.username ORDER BY tbl_chat.waktu ASC");
            while($r=mysql_fetch_array($tampil)){
                echo "<br/><p class='message'><b> $r[nama_lengkap] </b> : (<i>$r[waktu]</i>)  <p> $r[pesan] </p>
                </p>";
            }

//          $this->load->view('chat_detail');
        }else{
            header('location:'.base_url());
        }
    }

    /*----------------------- Simpan Chat --------------------------------------*/
    public function simpan_chat (){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $up['tugas_code']	= $this->input->post('code_t');
            $up['tugas_name']   = $this->input->post('name_t');
            $up['icon_id']	    = $this->input->post('icon');

            $id['tugas_code']	= $this->input->post('code_t');

            $data = $this->app_model->getSelectedData("tbl_tugas",$id);

            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_tugas",$up,$id);

            }else{
                $this->app_model->insertData("tbl_tugas",$up);
            }
        }else{
            header('location:'.base_url());
        }
    }

    public function kirim (){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $nama = $this->app_model->CariUserPengguna();
            $time = gmdate("Y-m-d H:i:s", time()+60*60*7);

            $up['user']	    = $nama;
            $up['pesan']	= $this->input->post('pesan');
            $up['waktu']    = $time;

            $this->app_model->insertData("tbl_chat",$up);

        }else{
            header('location:'.base_url());
        }
    }


}

/* End of file index.php */
/* Location: ./application/controllers/home.php */