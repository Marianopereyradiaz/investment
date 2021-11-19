
<?php
class amounts_model extends CI_Model{

    private $table="amounts";

    function list(){
        $this->db->order_by("id_amount","desc");
        return $this->db->get($this->table)->result_array();
    }

    function get_first(){
        $this->db->order_by("id_amount","asc");
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function get_last(){
        $this->db->order_by("id_amount","desc");
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function calculate_accumulated(){
        $first=$this->get_first();
        $last=$this->get_last();
        if($first and $last){
            if($first["id_amount"]==$last["id_amount"]){
                return 0;
            }else{
                return $last["amount"]-$first["amount"];
            }
        }else{
            return 0;
        }
    }

    function add($amount=0){
        $last=$this->get_last();
        if($last){
            $this->db->set("diff",$amount-$last["amount"]);
        }else{
            $this->db->set("diff",'NULL', false);
        }
        $this->db->set("amount",$amount);
        $this->db->insert($this->table);
    }

    function delete($id_amount=0){
        $this->db->where("id_amount",$id_amount);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
?>