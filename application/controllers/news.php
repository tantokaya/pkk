<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman awal ketika aplikasi  diakses
     **/

    function __construct(){
        parent::__construct();
        $this->load->helper('permalink_helper');
		$this->load->helper('captcha');
        $this->load->model('polling_model');
    }

    public function detail()
    {
        $d['title']                 = $this->post_model->CariPostByTitle();
        $d['title_aplikasi']        = $this->config->item('nama_aplikasi');
        $d['keywords']              = $this->post_model->CariPostByKeywords();
        $d['descriptions']          = $this->post_model->CariPostByDescriptions();
        $d['all_panel']             = $this->app_model->get_all_panel();
        $d['all_hot']	            = $this->app_model->get_all_hot();
        $d['all_new_post']	        = $this->app_model->get_all_new_post();
	    $d['all_post_by_w_1_1']	    = $this->widget_model->get_all_post_by_w_1_1();
        $d['all_post_by_w_1_2']	    = $this->widget_model->get_all_post_by_w_1_2();
	    $d['all_post_by_kategori']	= $this->app_model->get_all_post_by_kategori();
        $d['all_post_by_detail']	= $this->app_model->get_all_post_by_detail();
        $d['all_new_post_baca']	    = $this->app_model->get_all_new_post_baca();
		$d['all_komen_by_post_id']  = $this->app_model->getKomentarByPostId();
		$d['all_slide_post']        = $this->app_model->get_all_slide_post();


	    $d['jumlah_pengunjung'] = $this->statistik_model->pengunjung();
		
		$cap = $this->buat_captcha();
        $data = array(
            'captcha_time'  =>  $cap['time'],
            'ip_address'    =>  $this->input->ip_address(),
            'kode_captcha'  =>  $cap['word']

        );
		
        $this->session->set_userdata($data);
        $d['cap_img'] = $cap['image'];

        // handle polling data
        $d['polling'] = $this->polling_model->get_polling_data('tbl_polling');
        $vote = 0;
        for($i=1;$i<=5;$i++){
            $hitung = $this->db->query("SELECT vote{$i} as vote FROM tbl_polling");
            $result = $hitung->row_array();

            $vote = $vote + $result['vote'];

        }

        $d['total_vote'] = $vote;

        $d['content']= $this->load->view('berita',$d,true);
        $this->load->view('home',$d);
    }
	
	public function post_comment()
    {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('website', 'Website', 'trim|prep_url');
        $this->form_validation->set_rules('komentar', 'Komentar', 'trim|required|xss_clean');

        $this->form_validation->set_rules('kode_captcha', 'Kode Captcha', 'trim|required|callback_check_captcha');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == FALSE)
        {
            $this->detail();
        }
        else
        {
            $komen = array(
                'komen_name' => $this->input->post('nama'),
                'komen_email' => $this->input->post('email'),
                'komen_web'  => $this->input->post('website'),
                'komen_isi'  => $this->input->post('komentar'),
                'post_id'    => $this->input->post('post_id'),
                'komen_tgl'  => gmdate("Y-m-d", time()+60*60*7),
                'komen_time' => gmdate("H:i:s", time()+60*60*7)
            );
            $this->app_model->insertData('tbl_komentar', $komen);

            $this->session->set_flashdata('info','Komentar berhasil disimpan!');

            //$this->detail();
            redirect("news/detail/".$this->uri->segment(3)."/".$this->uri->segment(4));
            //$this->home_model->add_message();
        }

    }

    public function buat_captcha()
    {
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'font_path' => './font/timesbd.ttf',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 60
        );
        $cap = create_captcha($vals);
        return $cap;
    }

    public function check_captcha()
    {
        $expiration = time()-7200; // Two hour limit
        $cap=$this->input->post('kode_captcha');
        if($this->session->userdata('kode_captcha')== $cap
            AND $this->session->userdata('ip_address')== $this->input->ip_address()
            AND $this->session->userdata('captcha_time')> $expiration)
        {
            return true;
        }
        else{
            $this->form_validation->set_message('check_captcha', 'Kode captcha salah.');
            return false;
        }
    }
}

/* End of file index.php */
/* Location: ./application/controllers/home.php */