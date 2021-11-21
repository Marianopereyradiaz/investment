
<?php
class funds_model extends CI_Model{

    private $table="funds";

    function list_by_user($id_user=0){
        $this->db->where("id_user",$id_user);
        $this->db->order_by("id_fund","desc");
        return $this->db->get($this->table)->result_array();
    }

    function get_first(){
        $this->db->order_by("id_fund","asc");
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function get_last(){
        $this->db->order_by("id_fund","desc");
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function add($name="", $id_user, $currency=""){
        $this->db->set("name",$name);
        $this->db->set("id_user",$id_user);
        $this->db->set("currency",$currency);
        $this->db->insert($this->table);
    }

    function delete($id_fund=0){
        $this->db->where("id_fund",$id_fund);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
?>