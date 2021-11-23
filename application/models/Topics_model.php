<?php
class Topics_model extends CI_Model{

    private $table="topic";

    function list(){
        $this->db->order_by("date","desc");
        return $this->db->get($this->table)->result_array();
    }

    function add($name="", $content="", $user=""){
        $this->db->set("name",$name);
        $this->db->set("content",$content);
        $this->db->set("user",$user);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    function delete($id_topic=''){
        $this->db->where("id_topic",$id_topic);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    function get_by_id($id_topic=''){
        $this->db->where("id_topic",$id_topic);
        $this->db->limit(1);
        $res=$this->db->get($this->table);
        return $res->row_array();
    }
}
?>