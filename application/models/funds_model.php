<?php
class Funds_model extends CI_Model{

    private $table="funds";

    function list_by_user($id_user=0){
        $this->db->where("id_user",$id_user);
        $this->db->where("state",1);
        $this->db->order_by("id_fund","desc");
        return $this->db->get($this->table)->result_array();
    }

    function add($name="", $id_user=0, $currency=""){
        $this->db->set("name",$name);
        $this->db->set("id_user",$id_user);
        $this->db->set("currency",$currency);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    function delete($id_fund=''){
        $this->db->where("id_fund",$id_fund);
        $this->db->set("state",0);
        $this->db->limit(1);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    public function get_by_id($id_fund=""){
        $this->db->where("id_fund",$id_fund);
        $this->db->limit(1);
        $res=$this->db->get($this->table);
        return $res->row_array();
    }

    public function update($id_fund="",$perc="",$total=""){
        $this->db->where("id_fund",$id_fund);
        $this->db->set("percentage",$perc);
        $this->db->set("total",$total);
        $this->db->limit(1);
        $this->db->update($this->table);
    }

    function list_all_by_user($id_user=0){
        $this->db->where("id_user",$id_user);
        $this->db->order_by("id_fund","desc");
        return $this->db->get($this->table)->result_array();
    }

    function delete_real($id_fund=''){
        $this->db->where("id_fund",$id_fund);
        $this->db->limit(1);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }
}
?>