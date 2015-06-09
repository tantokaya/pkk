<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

    /**
     * @author : Hartanto Kurniawan,S.Kom and Aditya Nursyahbani, S.SI
     * @web : http://www.risetkomputer.com
     * @keterangan : Controller untuk halaman Agenda
     **/
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('upload');
		$this->load->library('functions');

    }

    public function index()
    {
        $cek = $this->session->userdata('logged_in');
        //$lvl = $this->session->userdata('id_level');

        if(!empty($cek)){

            $d['judul']         ="list_agenda";
            $d['judul_halaman'] = "Daftar Agenda";
            $d['judul_keterangan']="Daftar Seluruh Agenda";

            $d['all_agenda']	    = $this->app_model->get_all_agenda();
            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/agenda/view',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url().'/adpus');
        }
    }

    public function tambah(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='add_agenda';
            $d['judul_halaman']='Tambah AGENDA';
            $d['judul_keterangan']="Tambah data Agenda";

            $kode	= $this->app_model->MaxKodeAgenda();

            $d['code']      = $kode;
            $d['name']      = '';
            $d['desc']      = '';
            $d['mulai']     = '';
            $d['akhir']     = '';
            $d['lokasi']    = '';
            $d['mitra']     = '';
            $d['l_lampiran']= '';

            $text = "SELECT * FROM tbl_mitra";
            $d['l_mitra'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/agenda/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function simpan (){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $nama   = $this->app_model->CariUserPengguna();
            $cabang = $this->app_model->CariUserCabang();

            $up['username']	    = $nama;
            $up['cabang_id']	= $cabang;
            $up['agenda_code'] = $this->input->post('code');
            $up['agenda_name']	= $this->input->post('name');
            $up['agenda_desc']	= $this->input->post('desc');
            $up['agenda_mulai'] = $this->functions->convert_date_sql($this->input->post('mulai'));
            $up['agenda_akhir'] = $this->functions->convert_date_sql($this->input->post('akhir'));
            $up['agenda_lokasi'] = $this->input->post('lokasi');
            $up['mitra_code'] = $this->input->post('mitra');
            $up['nip']          = $this->session->userdata('nip');

            $id['agenda_code']	= $this->input->post('code');			
			
			$this->db->trans_start();
			
			$data = $this->app_model->getSelectedData("tbl_agenda",$id);

            if($data->num_rows()>0){
                $this->app_model->updateData("tbl_agenda",$up,$id);

            }else{
                $this->app_model->insertData("tbl_agenda",$up);
            }
			
			// handling file upload
			if($this->input->post('lampiran')){
				$lampiranid=$this->input->post('lampiran');
				foreach($lampiranid as $id){
					$datalamp=array(
						'agenda_code'=>$this->input->post('code'),
						'lampiran_id'=>$id
					);
					//print_r($datalamp); exit;
					$this->app_model->insertData("tbl_lampiran_agenda",$datalamp);
					$lamp=$this->app_model->get_lampiran_by_id($id);
					#print $lamp; exit;
					$source_dir = './uploads/temp/';
					$target_dir = './uploads/';
					$nama_file = $lamp->lampiran_nama;
					
					if(file_exists($source_dir . $nama_file)){
						// pindahkan dari temporary
						rename($source_dir . $nama_file, $target_dir . $nama_file);
						// finally remove file from temp
						if(is_file($source_dir . $nama_file)){
							unlink($source_dir . $nama_file);
						}
					}
				}
			}
			
			$this->db->trans_complete();

			//jika transaksi gagal maka rollback
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->session->set_flashdata('notif', 'Data agenda gagal disimpan!');
			}else{
				//jika berhasil lakukan disini 
				$this->db->trans_commit();
				$this->session->set_flashdata('notif', 'Data agenda berhasil disimpan!');
			}
			
			redirect('agenda');
						
        }else{
            header('location:'.base_url());
        }
    }

    public function edit(){
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){

            $d['judul']='edit_agenda';
            $d['judul_halaman']='Edit AGENDA';
            $d['judul_keterangan']="Edit data Agenda";

            $id = $this->uri->segment(3);
            $text = "SELECT * FROM tbl_agenda WHERE agenda_code='$id'";
            $data = $this->app_model->manualQuery($text);

            if($data->num_rows() > 0){
                foreach($data->result() as $db){
                    $d['code']	   = $id;
                    $d['name']	   = $db->agenda_name;
                    $d['desc']     = $db->agenda_desc;
                    $d['mulai']    = $this->functions->convert_date_indo(array("datetime" => $db->agenda_mulai));
                    $d['akhir']    = $this->functions->convert_date_indo(array("datetime" => $db->agenda_akhir));
                    $d['lokasi']    = $db->agenda_lokasi;
                    $d['mitra']    = $db->mitra_code;
					$d['l_mitra'] 	= $this->app_model->get_all_mitra();
					$d['l_lampiran'] = $this->app_model->get_list_lampiran($id);                    
                }
            }else{

                $d['code']		    = $id;
                $d['name']		    = '';
                $d['desc']          = '';
                $d['mulai']         = '';
                $d['akhir']         = '';
                $d['lokasi']         = '';
                $d['mitra']         = '';
              
            }

	        $text = "SELECT * FROM tbl_mitra";
            $d['l_mitra'] = $this->app_model->manualQuery($text);
	

            $text = "SELECT * FROM tbl_admin";
            $d['l_pengguna'] = $this->app_model->manualQuery($text);

            $d['all_new_post_publish']	= $this->app_model->get_all_new_post_publish();
            $d['all_new_komen_publish']	= $this->app_model->get_all_new_komen_publish();

            $d['content']= $this->load->view('admin/agenda/form',$d,true);
            $this->load->view('admin/home_adm',$d);
        }else{
            header('location:'.base_url());
        }
    }

    public function hapus()  {
        $cek = $this->session->userdata('logged_in');
        if(!empty($cek)){
            $id = $this->uri->segment(3);
            $this->app_model->manualQuery("DELETE FROM tbl_agenda WHERE agenda_code='$id'");
            echo "<meta http-equiv='refresh' content='0; url=".base_url()."agenda'>";
        }else{
            header('location:'.base_url());
        }
    }
	
	public function hapus_lampiran($lampiran_id)
	{
		// delete di table lampiran agenda
		$this->app_model->manualQuery("DELETE FROM tbl_lampiran_agenda WHERE lampiran_id='$lampiran_id'");
		
		// get filename
		$lampiran = $this->app_model->get_lampiran_by_id($lampiran_id);
		
		// hapus file existing
		$dir = './uploads/';
		if(file_exists($dir . $lampiran->lampiran_nama)){
			unlink($dir . $lampiran->lampiran_nama);
		}
		
		// delete di table lampiran 
		$this->app_model->manualQuery("DELETE FROM tbl_lampiran WHERE lampiran_id='$lampiran_id'");
		
		return true;
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
			$allowedExtensions = array("doc", "docx", "pdf", "xls","xlsx"); 
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
        $query = $this->app_model->hapus_lampiran_agenda($lampId);

        $status = "false";
        if ($this->db->affected_rows() > 0){
            $status = "true";
        }
        echo $status;
    }
}

/* End of file agenda.php */
/* Location: ./application/controllers/agenda.php */