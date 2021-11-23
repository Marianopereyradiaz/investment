<?php
class Comments_model extends CI_Model{

    private $table="comments";
    
    function add($message="", $user="", $id_topic=""){
        $this->db->set("message",$message);
        $this->db->set("id_topic",$id_topic);
        $this->db->set("user",$user);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    function delete($id_message){
        $this->db->where("id_message",$id_message);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    function list_by_topic($id_topic=0){
        $this->db->where("id_topic",$id_topic);
        $this->db->order_by("date","desc");
        return $this->db->get($this->table)->result_array();
    }
}
?>