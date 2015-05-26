<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Polling_Model extends CI_Model {

    /**
     * @author : Aditya Nursyahbani,S.SI
     * @email : gudhel@aditya-nursyahbani.com
     * @keterangan : Model untuk menangani modul polling
     **/

    public function __construct() {
        parent::__construct();
    }

    function insert_data($table,$data) {
        $this->db->insert($table, $data);
    }

    function update_data($table,$data,$key) {
        $this->db->where($key);
        $this->db->update($table, $data);
    }

    function delete_data($table,$where=0) {
        if($where != 0) {
            foreach($where as $key=>$val){
                $this->db->where($key, $val);
            }
        }
        $this->db->delete($table);
    }

    function get_selected_data($table, $where) {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();

        return $query->row();
    }

    function get_polling_data($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }

    function get_jml_vote($i){
        $this->db->select('vote'.$i);
        $this->db->from('tbl_polling');
        $query = $this->db->get();
        return $query->row();
    }

}
/* End of file polling_model.php */
/* Location: ./application/models/polling_model.php */