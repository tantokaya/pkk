<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {

	/**
     * @author : Hartanto Kurniawan,S.Kom
     * @web : http://www.risetkomputer.com
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	
	
	
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
		
	//select table
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	
	//update table
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	public function CariLevel($id){
		$t = "SELECT * FROM tbl_level WHERE id_level='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->level;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
    public function CariUserPengguna(){
        $id = $this->session->userdata('username');
        $t = "SELECT * FROM tbl_admin WHERE username='$id'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->username;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }



    public function CariNamaPengguna(){
		$id = $this->session->userdata('username');
		$t = "SELECT * FROM tbl_admin WHERE username='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->nama_lengkap;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	
	public function CariFotoPengguna(){
		$id = $this->session->userdata('username');
		$t = "SELECT * FROM tbl_admin WHERE username='$id'";
		$d = $this->app_model->manualQuery($t);
		$r = $d->num_rows();
		if($r>0){
			foreach($d->result() as $h){
				$hasil = $h->foto;
			}
		}else{
			$hasil = '';
		}
		return $hasil;
	}
	


		
	//Konversi tanggal
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'/'.$exp[1].'/'.$exp[0];
		}
		return $date;
	}
	
	public function ambilTgl($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[2];
		return $tgl;
	}
	
	public function ambilBln($tgl){
		$exp = explode('-',$tgl);
		$tgl = $exp[1];
		$bln = $this->app_model->getBulan($tgl);
		$hasil = substr($bln,0,3);
		return $hasil;
	}
	
	public function tgl_indo($tgl){
            $jam = substr($tgl,11,10);
			$tgl = substr($tgl,0,10);
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam;
	}	

	public function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 
	
	public function hari_ini($hari){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$hari];
		return $hari_ini;
	}
	
	//query login
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));
		$q_cek_login = $this->db->get_where('tbl_admin', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'aingLoginYeuh';
						$sess_data['username'] = $qad->username;
						$sess_data['id_level'] = $qad->id_level;
						$sess_data['nama_lengkap'] = $qad->nama_lengkap;
						$sess_data['foto'] = $qad->foto;
						$sess_data['level'] = $qad->level;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'adpus/home');
			}
		}
		else
		{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
			header('location:'.base_url().'adpus');
		}
	}

    public function MaxKodeAgenda(){
        $bln = date('m');
        $th = date('y');
        $text = "SELECT max(agenda_code) as no FROM tbl_agenda";
        $data = $this->app_model->manualQuery($text);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $no = $t->no;
                $tmp = ((int) substr($no,2,8))+1;
                $hasil = 'AG'.sprintf("%08s", $tmp);
            }
        }else{
            $hasil = 'AG'.'00000001';
        }
        return $hasil;
    }
    public function MaxKodeTopik(){
        $bln = date('m');
        $th = date('y');
        $text = "SELECT max(topik_code) as no FROM tbl_topik";
        $data = $this->app_model->manualQuery($text);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $no = $t->no;
                $tmp = ((int) substr($no,2,9))+1;
                $hasil = 'TU'.sprintf("%09s", $tmp);
            }
        }else{
            $hasil = 'TO'.'000000001';
        }
        return $hasil;
    }

    function get_all_kategori() {
        $this->db->select('tbl_kategori.kategori_id,tbl_kategori.kategori,tbl_kategori.widget_id,tbl_widget.widget_judul');
        $this->db->from('tbl_kategori');
        $this->db->join('tbl_widget','tbl_kategori.widget_id = tbl_widget.widget_id','left');
        $this->db->order_by('kategori_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_agenda() {
        $pengguna = $this->session->userdata('username');

        $this->db->select('tbl_agenda.agenda_id,tbl_agenda.agenda_code,tbl_agenda.agenda_name,tbl_agenda.agenda_desc,tbl_agenda.agenda_mulai,
            tbl_agenda.agenda_akhir,tbl_agenda.agenda_lokasi,tbl_agenda.mitra_code');
        $this->db->from('tbl_agenda');

        $lvl = $this->session->userdata('id_level');
        if($lvl !== '01' ){
            $this->db->where('username',$pengguna);
        }

        $this->db->order_by('agenda_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }
    function get_all_mitra() {
        $this->db->select('tbl_mitra.mitra_code,tbl_mitra.mitra_name,tbl_mitra.mitra_addr,tbl_mitra.mitra_telp,tbl_mitra.mitra_email,
                            tbl_mitra.mitra_desc,tbl_mitra.mitra_cp');
        $this->db->from('tbl_mitra');
        $this->db->order_by('mitra_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }

    function insert_lampiran($data){
        $this->db->insert('tbl_lampiran',$data);
        return $this->db->insert_id();
    }

    function get_lampiran_by_id($id)
    {
        $this->db->select("*");
        $this->db->from("tbl_lampiran");
        $this->db->where("lampiran_id",$id);
        return $this->db->get()->row();
    }

    function get_list_lampiran($id)
    {
        $this->db->select("la.agenda_code,la.lampiran_id, l.lampiran_nama, l.lampiran_size, l.lampiran_ext");
        $this->db->from("tbl_lampiran_agenda la");
        $this->db->join('tbl_lampiran l', 'la.lampiran_id=l.lampiran_id');
        $this->db->where("la.agenda_code",$id);
        return $this->db->get()->result_array();
    }

    function get_list_lampiran_dokumen($id)
    {
        $this->db->select("la.dok_code,la.lampiran_id, l.lampiran_nama, l.lampiran_size, l.lampiran_ext");
        $this->db->from("tbl_lampiran_dokumen la");
        $this->db->join('tbl_lampiran l', 'la.lampiran_id=l.lampiran_id');
        $this->db->where("la.dok_code",$id);
        return $this->db->get()->result_array();
    }

    function hapus_lampiran($id){
        $sql = "DELETE FROM tbl_lampiran WHERE lampiran_id =? ";
        $this->db->query($sql, array($id));
        return $this->db->affected_rows();
    }

    function hapus_lampiran_agenda($id)
    {
        $sql = "DELETE FROM tbl_lampiran_agenda WHERE lampiran_id =? ";
        $this->db->query($sql, array($id));
        return $this->db->affected_rows();
    }

    function hapus_lampiran_dokumen($id)
    {
        $sql = "DELETE FROM tbl_lampiran_dokumen WHERE lampiran_id =? ";
        $this->db->query($sql, array($id));
        return $this->db->affected_rows();
    }

    function get_all_topik() {
        $this->db->select('*');
        $this->db->from('tbl_topik');
        $this->db->order_by('topik_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_topik_reply($per_page, $offset) {
        $id = $this->uri->segment(3);
        if($offset!=0) $offset = ($offset-1) * $per_page;

        $this->db->select('tbl_admin.nama_lengkap,tbl_admin.foto,tbl_topik_reply.reply_id,tbl_topik_reply.reply_code,
                            tbl_topik_reply.reply_title,tbl_topik_reply.reply_post,tbl_topik_reply.reply_time,tbl_topik_reply.username,tbl_admin.hp,tbl_admin.email');
        $this->db->from('tbl_topik_reply');
        $this->db->join('tbl_admin','tbl_topik_reply.username = tbl_admin.username');
        $this->db->order_by('tbl_topik_reply.reply_code', 'desc');
        $this->db->limit($per_page, $offset);
        $this->db->where('tbl_topik_reply.reply_code',$id);

        $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function get_all_topik_reply_count() {
        $id = $this->uri->segment(3);

        $this->db->select('tbl_admin.nama_lengkap,tbl_admin.foto,tbl_topik_reply.reply_id,tbl_topik_reply.reply_code,
                            tbl_topik_reply.reply_title,tbl_topik_reply.reply_post,tbl_topik_reply.reply_time,tbl_topik_reply.username,tbl_admin.hp,tbl_admin.email');
        $this->db->from('tbl_topik_reply');
        $this->db->join('tbl_admin','tbl_topik_reply.username = tbl_admin.username');
        $this->db->order_by('tbl_topik_reply.reply_code', 'desc');
        $query = $this->db->get();

        $this->db->where('tbl_topik_reply.reply_code',$id);

        return $query->num_rows();
    }
    function get_all_event()
    {
        $this->db->select('a.agenda_code as id, a.agenda_name as title, a.agenda_mulai as start, a.agenda_akhir as end, a.agenda_desc as description, a.agenda_lokasi as location, m.mitra_name as mitra, u.nama_lengkap as nama, u.hp as tlp');
        $this->db->from('tbl_agenda a');
        $this->db->join('tbl_mitra m', 'a.mitra_code=m.mitra_code');
        $this->db->join('tbl_admin u', 'a.username=u.username');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_halaman()
    {
        $this->db->select('*');
        $this->db->from('tbl_halaman');

        $query = $this->db->get();

        return $query->result_array();
    }
    function get_all_sub_halaman()
    {
        $this->db->select('tbl_sub_halaman.sub_hal_id,tbl_sub_halaman.sub_hal_name,
        tbl_sub_halaman.hal_id,tbl_halaman.hal_name');
        $this->db->from('tbl_sub_halaman');
        $this->db->join('tbl_halaman', 'tbl_sub_halaman.hal_id = tbl_halaman.hal_id');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_tag()
    {
        $this->db->select('*');
        $this->db->from('tbl_tag');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_sensor()
    {
        $this->db->select('*');
        $this->db->from('tbl_sensor');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_komentar()
    {
        $this->db->select('*');
        $this->db->from('tbl_komentar');

        $query = $this->db->get();

        return $query->result_array();
    }


    function get_all_post() {
        $pengguna = $this->session->userdata('username');

        $this->db->select('tbl_post.post_id,tbl_post.post_tgl,tbl_post.post_time,tbl_post.post_judul,tbl_post.post_isi,
                tbl_post.post_gambar,tbl_post.post_tag,tbl_post.kategori_id,tbl_post.username,tbl_post.publish,tbl_kategori.kategori');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id');

        $lvl = $this->session->userdata('id_level');
        if($lvl !== '01' ){
            $this->db->where('username',$pengguna);
        }

        $this->db->order_by('tbl_post.post_id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }


    function get_all_post_by_kategori()
    {
        $this->db->select('tbl_kategori.kategori_id,tbl_kategori.kategori,tbl_kategori.widget_id,tbl_post.post_id,tbl_post.post_tgl,
            tbl_post.post_time,tbl_post.post_judul,tbl_post.post_judul_seo,tbl_post.post_isi,tbl_post.publish,
            COUNT(tbl_post.kategori_id) as jml');
        $this->db->from('tbl_kategori');
        $this->db->join('tbl_post','tbl_kategori.kategori_id = tbl_post.kategori_id', 'left');
        $this->db->where('tbl_post.publish','Y');
        $this->db->group_by('kategori');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(9);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_post_by_detail()
    {
        $kat = $this->app_model->CariPostByKategori();

        $this->db->select('tbl_post.post_id,tbl_post.post_tgl,tbl_post.post_time,tbl_post.post_judul,tbl_post.post_isi,
                tbl_post.post_gambar,tbl_post.post_tag,tbl_post.kategori_id,tbl_kategori.kategori');
        $this->db->from('tbl_post');
        $this->db->join('tbl_kategori','tbl_post.kategori_id = tbl_kategori.kategori_id');
        $this->db->where('tbl_post.kategori_id',$kat);
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_new_post()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_tgl,tbl_post.post_time');
        $this->db->from('tbl_post');
        $this->db->where('tbl_post.publish','Y');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(7);

        $query = $this->db->get();

        return $query->result_array();
    }
	
    function get_all_new_post_baca()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_tgl,tbl_post.post_time,tbl_post.dibaca');
        $this->db->from('tbl_post');
        $this->db->where('tbl_post.publish','Y');
        $this->db->where('tbl_post.dibaca !=','0');
        $this->db->order_by('tbl_post.dibaca','DESC');
        $this->db->limit(9);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_album()
    {
        $this->db->select('*');
        $this->db->from('tbl_album');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_galeri_foto()
    {
        $this->db->select('tbl_galeri_foto.gfoto_id,tbl_galeri_foto.gfoto_name,tbl_galeri_foto.gfoto_image,tbl_galeri_foto.album_id,
        tbl_galeri_foto.gfoto_date,tbl_galeri_foto.gfoto_time,tbl_galeri_foto.`status`,tbl_album.album_name');
        $this->db->from('tbl_galeri_foto');
        $this->db->join('tbl_album','tbl_galeri_foto.album_id = tbl_album.album_id');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_hot()
    {
        $this->db->select('*');
        $this->db->from('tbl_hot');
        $this->db->order_by('hot_id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_panel()
    {
        $this->db->select('*');
        $this->db->from('tbl_panel');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_slide()
    {
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->order_by('slide_id','DESC');

        $query = $this->db->get();

        return $query->result_array();
    }



    public  function CariPostByJudul(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->post_judul;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public  function CariPostByTgl(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $this->app_model->tgl_indo($h->post_tgl);
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
	
    public  function CariPostByHari(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $this->app_model->tgl_str($h->post_tgl);
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPostByTime(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->post_time;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }
    public  function CariPostByIsi(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->post_isi;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPostByImage(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->post_gambar;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function CariPostByKategori(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->kategori_id;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

   public  function CariPostBydibaca(){
        $kode = $this->uri->segment(3);
        $p_kode = explode("-",$kode);
        $t = "SELECT * FROM tbl_post WHERE post_id = '$p_kode[0]'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->dibaca;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function HitungPostByJudul(){
        $t = "SELECT COUNT(post_id) as total FROM tbl_post WHERE publish = 'N'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->total;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function HitungAllPostByJudul(){

        $t = "SELECT COUNT(post_id) as total FROM tbl_post";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->total;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    public  function HitungAllPengguna(){

        $t = "SELECT COUNT(username) as total FROM tbl_admin WHERE id_level = '03'";
        $d = $this->app_model->manualQuery($t);
        $r = $d->num_rows();
        if($r>0){
            foreach($d->result() as $h){
                $hasil = $h->total;
            }
        }else{
            $hasil = '';
        }
        return $hasil;
    }

    function get_all_new_post_publish()
    {
        $this->db->select('tbl_post.post_id,tbl_post.post_judul,tbl_post.post_isi,tbl_post.post_gambar,tbl_post.username,tbl_post.publish,
                        tbl_admin.nama_lengkap,tbl_admin.foto');
        $this->db->from('tbl_post');
        $this->db->join('tbl_admin','tbl_post.username = tbl_admin.username','left');
        $this->db->where('tbl_post.publish','N');
        $this->db->order_by('tbl_post.post_id','DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function fbfan($pageid) {
        $data = file_get_contents('http://graph.facebook.com/' . $pageid);
        if($data){
            $info = json_decode($data);
            return $info->likes;
        }
    }

    public function JmlTopikPerkenalan(){
        $query = $this->db->query("SELECT * FROM tbl_topik WHERE kategori_id = 'perkenalan'");

        return $query->num_rows();
    }

    public function JmlTopikPengumuman(){
        $query = $this->db->query("SELECT * FROM tbl_topik WHERE kategori_id = 'pengumuman'");

        return $query->num_rows();
    }

    public function JmlTopikSaran(){
        $query = $this->db->query("SELECT * FROM tbl_topik WHERE kategori_id = 'saran'");

        return $query->num_rows();
    }

    public function JmlTopikPojok(){
        $query = $this->db->query("SELECT * FROM tbl_topik WHERE kategori_id = 'pojok'");

        return $query->num_rows();
    }

    function get_all_forum_perkenalan() {
        $pengguna = 'perkenalan';

        $this->db->select('*');
        $this->db->from('tbl_topik');
        $this->db->where('kategori_id',$pengguna);
        $this->db->order_by('topik_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_forum_pengumuman() {
        $pengguna = 'pengumuman';

        $this->db->select('*');
        $this->db->from('tbl_topik');
        $this->db->where('kategori_id',$pengguna);
        $this->db->order_by('topik_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_forum_saran() {
        $pengguna = 'saran';

        $this->db->select('*');
        $this->db->from('tbl_topik');
        $this->db->where('kategori_id',$pengguna);
        $this->db->order_by('topik_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_all_forum_pojok() {
        $pengguna = 'pojok';

        $this->db->select('*');
        $this->db->from('tbl_topik');
        $this->db->where('kategori_id',$pengguna);
        $this->db->order_by('topik_code', 'desc');

        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function JumlahKomentarByPostId()
    {
        $post_id = $this->uri->segment(3);

        $this->db->select('COUNT(*) as jml_komentar');
        $this->db->from('tbl_komentar');
        $this->db->where('post_id', $post_id);
        $this->db->where('publish', 'Y');

        $result = $this->db->get()->row_array();

        return $result['jml_komentar'];
    }
	
	public function getKomentarByPostId()
    {
        $post_id = $this->uri->segment(3);

        $this->db->select('*');
        $this->db->from('tbl_komentar');
        $this->db->where('post_id', $post_id);
        $this->db->where('publish', 'Y');
        $this->db->order_by('komen_tgl', 'desc');

        $result = $this->db->get();

        if($result->num_rows()>0)
            $komen = $result->result_array();

        else
            $komen = '';

        return $komen;

    }

}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */